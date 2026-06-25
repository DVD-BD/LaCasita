const STORAGE_KEY = 'lacasita_static_db_v1';
const SESSION_KEY = 'lacasita_static_session_v1';

const initialDB = {
  users: [
    { id: 1, name: 'Administrador', email: 'admin@lacasita.com', password: '123456', role: 'administrador' },
    { id: 2, name: 'Empleado General', email: 'empleado@lacasita.com', password: '123456', role: 'empleado', employeeId: 1 },
    { id: 3, name: 'Cliente General', email: 'cliente@lacasita.com', password: '123456', role: 'cliente', clientId: 1 }
  ],
  clients: [
    { id: 1, name: 'Cliente General', email: 'cliente@lacasita.com', phone: '5512345678' },
    { id: 2, name: 'María López', email: 'maria@email.com', phone: '5587654321' },
    { id: 3, name: 'Carlos Pérez', email: 'carlos@email.com', phone: '5555443322' }
  ],
  employees: [
    { id: 1, name: 'Empleado General', email: 'empleado@lacasita.com', position: 'Cajero', branch: 'Sucursal Centro' },
    { id: 2, name: 'Ana Martínez', email: 'ana@lacasita.com', position: 'Inventario', branch: 'Sucursal Norte' }
  ],
  products: [
    { id: 1, name: 'Leche entera', category: 'Lácteos', price: 28.50, stock: 18, icon: '🥛' },
    { id: 2, name: 'Pan dulce', category: 'Panadería', price: 15.00, stock: 25, icon: '🥐' },
    { id: 3, name: 'Manzanas', category: 'Frutas', price: 42.00, stock: 14, icon: '🍎' },
    { id: 4, name: 'Cereal familiar', category: 'Abarrotes', price: 68.00, stock: 10, icon: '🥣' },
    { id: 5, name: 'Jugo natural', category: 'Bebidas', price: 32.00, stock: 16, icon: '🧃' },
    { id: 6, name: 'Papel higiénico', category: 'Hogar', price: 54.00, stock: 12, icon: '🧻' }
  ],
  sales: [
    { id: 1, clientId: 1, employeeId: 1, date: new Date().toISOString(), total: 43.50, status: 'Pagada' }
  ],
  saleDetails: [
    { id: 1, saleId: 1, productId: 1, quantity: 1, unitPrice: 28.50 },
    { id: 2, saleId: 1, productId: 2, quantity: 1, unitPrice: 15.00 }
  ]
};

let state = {
  db: loadDB(),
  user: loadSession(),
  view: 'dashboard',
  message: ''
};

function loadDB() {
  const saved = localStorage.getItem(STORAGE_KEY);
  return saved ? JSON.parse(saved) : structuredClone(initialDB);
}

function saveDB() {
  localStorage.setItem(STORAGE_KEY, JSON.stringify(state.db));
}

function loadSession() {
  const saved = localStorage.getItem(SESSION_KEY);
  return saved ? JSON.parse(saved) : null;
}

function saveSession(user) {
  localStorage.setItem(SESSION_KEY, JSON.stringify(user));
}

function resetDB() {
  localStorage.removeItem(STORAGE_KEY);
  state.db = structuredClone(initialDB);
  state.message = 'Datos reiniciados correctamente.';
  render();
}

function nextId(collection) {
  return collection.length ? Math.max(...collection.map(item => item.id)) + 1 : 1;
}

function money(value) {
  return Number(value).toLocaleString('es-MX', { style: 'currency', currency: 'MXN' });
}

function dateFormat(value) {
  return new Date(value).toLocaleString('es-MX');
}

function getClient(id) {
  return state.db.clients.find(client => client.id === Number(id));
}

function getProduct(id) {
  return state.db.products.find(product => product.id === Number(id));
}

function getEmployee(id) {
  return state.db.employees.find(employee => employee.id === Number(id));
}

function login(event) {
  event.preventDefault();
  const form = new FormData(event.target);
  const email = form.get('email').trim().toLowerCase();
  const password = form.get('password').trim();
  const user = state.db.users.find(item => item.email.toLowerCase() === email && item.password === password);

  if (!user) {
    state.message = 'Correo o contraseña incorrectos.';
    renderPublic(true);
    return;
  }

  state.user = user;
  state.view = 'dashboard';
  state.message = `Bienvenido, ${user.name}.`;
  saveSession(user);
  render();
}

function logout() {
  localStorage.removeItem(SESSION_KEY);
  state.user = null;
  state.view = 'dashboard';
  state.message = '';
  render();
}

function setView(view) {
  state.view = view;
  state.message = '';
  render();
}

function buyProduct(productId, clientId = null, quantity = 1, employeeId = null) {
  const product = getProduct(productId);
  const qty = Number(quantity);

  if (!product || qty <= 0) {
    state.message = 'Producto o cantidad no válida.';
    render();
    return;
  }

  if (product.stock < qty) {
    state.message = 'No hay suficiente stock para completar la compra.';
    render();
    return;
  }

  const finalClientId = clientId || state.user.clientId;
  const saleId = nextId(state.db.sales);
  const detailId = nextId(state.db.saleDetails);

  product.stock -= qty;

  state.db.sales.push({
    id: saleId,
    clientId: Number(finalClientId),
    employeeId: employeeId ? Number(employeeId) : null,
    date: new Date().toISOString(),
    total: product.price * qty,
    status: 'Pagada'
  });

  state.db.saleDetails.push({
    id: detailId,
    saleId,
    productId: product.id,
    quantity: qty,
    unitPrice: product.price
  });

  saveDB();
  state.message = 'Compra registrada correctamente. El stock y las ventas fueron actualizados.';
  state.view = state.user.role === 'cliente' ? 'compras' : 'ventas';
  render();
}

function addProduct(event) {
  event.preventDefault();
  const form = new FormData(event.target);
  state.db.products.push({
    id: nextId(state.db.products),
    name: form.get('name'),
    category: form.get('category'),
    price: Number(form.get('price')),
    stock: Number(form.get('stock')),
    icon: form.get('icon') || '🛒'
  });
  saveDB();
  state.message = 'Producto agregado correctamente.';
  render();
}

function addClient(event) {
  event.preventDefault();
  const form = new FormData(event.target);
  const clientId = nextId(state.db.clients);
  const email = form.get('email');
  state.db.clients.push({
    id: clientId,
    name: form.get('name'),
    email,
    phone: form.get('phone')
  });
  state.db.users.push({
    id: nextId(state.db.users),
    name: form.get('name'),
    email,
    password: '123456',
    role: 'cliente',
    clientId
  });
  saveDB();
  state.message = 'Cliente agregado correctamente. Contraseña inicial: 123456.';
  render();
}

function addEmployee(event) {
  event.preventDefault();
  const form = new FormData(event.target);
  const employeeId = nextId(state.db.employees);
  const email = form.get('email');
  state.db.employees.push({
    id: employeeId,
    name: form.get('name'),
    email,
    position: form.get('position'),
    branch: form.get('branch')
  });
  state.db.users.push({
    id: nextId(state.db.users),
    name: form.get('name'),
    email,
    password: '123456',
    role: 'empleado',
    employeeId
  });
  saveDB();
  state.message = 'Empleado agregado correctamente. Contraseña inicial: 123456.';
  render();
}

function deleteProduct(id) {
  state.db.products = state.db.products.filter(product => product.id !== Number(id));
  saveDB();
  state.message = 'Producto eliminado correctamente.';
  render();
}

function render() {
  if (!state.user) return renderPublic();

  document.querySelector('#app').innerHTML = `
    ${topbar(true)}
    <div class="shell">
      ${sidebar()}
      <main class="main">
        ${messageBox()}
        ${content()}
      </main>
    </div>
  `;
}

function topbar(isLogged = false) {
  return `
    <header class="topbar">
      <div class="brand">
        <div class="logo">🏪</div>
        <div>
          <strong>La Casita</strong>
          <small>${isLogged ? 'Sistema web' : 'Mini súper y abarrotes'}</small>
        </div>
      </div>
      <div class="nav-actions">
        ${isLogged ? `<button class="btn ghost" onclick="resetDB()">Reiniciar datos</button><button class="btn danger" onclick="logout()">Cerrar sesión</button>` : ''}
      </div>
    </header>
  `;
}

function renderPublic(keepMessage = false) {
  if (!keepMessage) state.message = '';
  document.querySelector('#app').innerHTML = `
    ${topbar(false)}
    <section class="hero">
      <div class="hero-card">
        <p class="eyebrow">Sistema web para mini súper</p>
        <h1>La Casita</h1>
        <p>Sistema para administrar productos, clientes, empleados, ventas e inventario de un mini súper de manera sencilla y organizada.</p>
        <div class="badges">
          <span class="badge">Administración</span>
          <span class="badge">Productos</span>
          <span class="badge">Ventas</span>
          <span class="badge">Inventario</span>
        </div>
      </div>
      <div class="login-card">
        <h2>Iniciar sesión</h2>
        <p>Usa las cuentas de prueba del proyecto.</p>
        ${messageBox()}
        <form class="form-grid" onsubmit="login(event)">
          <label>Correo</label>
          <input name="email" type="email" value="admin@lacasita.com" required>
          <label>Contraseña</label>
          <input name="password" type="password" value="123456" required>
          <button class="btn" type="submit">Entrar</button>
        </form>
        <div class="hint" style="margin-top:14px">
          Admin: admin@lacasita.com<br>
          Empleado: empleado@lacasita.com<br>
          Cliente: cliente@lacasita.com<br>
          Contraseña: 123456
        </div>
      </div>
    </section>
    <section class="main" style="max-width:1180px;margin:0 auto">
      <div class="header">
        <div>
          <p class="eyebrow">Catálogo</p>
          <h2>Productos disponibles</h2>
        </div>
      </div>
      ${productGrid(false)}
    </section>
  `;
}

function sidebar() {
  const user = state.user;
  const items = menuItems(user.role);
  return `
    <aside class="sidebar">
      <div class="profile">
        <div class="avatar">${user.name.charAt(0)}</div>
        <div><strong>${user.name}</strong><span>${user.role}</span></div>
      </div>
      <nav class="menu">
        ${items.map(item => `<button class="${state.view === item.view ? 'active' : ''}" onclick="setView('${item.view}')">${item.icon} ${item.label}</button>`).join('')}
      </nav>
    </aside>
  `;
}

function menuItems(role) {
  const common = [{ view: 'dashboard', label: 'Panel', icon: '📊' }];
  if (role === 'administrador') {
    return common.concat([
      { view: 'productos', label: 'Productos', icon: '🛒' },
      { view: 'clientes', label: 'Clientes', icon: '👥' },
      { view: 'empleados', label: 'Empleados', icon: '🧑‍💼' },
      { view: 'ventas', label: 'Ventas', icon: '💳' },
      { view: 'bd', label: 'Registros', icon: '🗄️' }
    ]);
  }
  if (role === 'empleado') {
    return common.concat([
      { view: 'productos', label: 'Productos', icon: '🛒' },
      { view: 'clientes', label: 'Clientes', icon: '👥' },
      { view: 'ventas', label: 'Ventas', icon: '💳' },
      { view: 'registrarVenta', label: 'Registrar venta', icon: '➕' }
    ]);
  }
  return common.concat([
    { view: 'catalogo', label: 'Catálogo', icon: '🛍️' },
    { view: 'compras', label: 'Mis compras', icon: '🧾' }
  ]);
}

function messageBox() {
  if (!state.message) return '';
  const isError = state.message.toLowerCase().includes('incorrect') || state.message.toLowerCase().includes('no hay');
  return `<div class="notice ${isError ? 'error' : ''}">${state.message}</div>`;
}

function content() {
  switch (state.view) {
    case 'productos': return renderProducts();
    case 'clientes': return renderClients();
    case 'empleados': return renderEmployees();
    case 'ventas': return renderSales();
    case 'catalogo': return renderCatalog();
    case 'compras': return renderPurchases();
    case 'registrarVenta': return renderRegisterSale();
    case 'bd': return renderDBView();
    default: return renderDashboard();
  }
}

function renderDashboard() {
  const totalSales = state.db.sales.reduce((sum, sale) => sum + sale.total, 0);
  return `
    <section class="header">
      <div><p class="eyebrow">Panel ${state.user.role}</p><h1>Resumen general</h1></div>
      <span class="badge">Sistema activo</span>
    </section>
    <section class="grid cols-4">
      <div class="card stat"><strong>${state.db.products.length}</strong><span>Productos</span></div>
      <div class="card stat"><strong>${state.db.clients.length}</strong><span>Clientes</span></div>
      <div class="card stat"><strong>${state.db.sales.length}</strong><span>Ventas</span></div>
      <div class="card stat"><strong>${money(totalSales)}</strong><span>Total vendido</span></div>
    </section>
    <section class="panel" style="margin-top:18px">
      <h2>Administración del sistema</h2>
      <p>Desde este panel se pueden consultar y administrar productos, clientes, empleados, ventas e inventario.</p>
    </section>
  `;
}

function productGrid(showBuy = true) {
  return `<div class="grid products">${state.db.products.map(product => `
    <article class="card product-card">
      <div class="product-art">${product.icon}</div>
      <div class="product-body">
        <h3>${product.name}</h3>
        <span class="badge">${product.category}</span>
        <div><span class="price">${money(product.price)}</span> · <span class="stock">Stock: ${product.stock}</span></div>
        ${showBuy && state.user?.role === 'cliente' ? `<button class="btn" onclick="buyProduct(${product.id})" ${product.stock <= 0 ? 'disabled' : ''}>Comprar</button>` : ''}
        ${state.user?.role === 'administrador' ? `<button class="btn danger small" onclick="deleteProduct(${product.id})">Eliminar</button>` : ''}
      </div>
    </article>`).join('')}</div>`;
}

function renderProducts() {
  const canAdd = state.user.role === 'administrador';
  return `
    <section class="header"><div><p class="eyebrow">Inventario</p><h1>Productos</h1></div></section>
    ${canAdd ? `<section class="panel" style="margin-bottom:18px">
      <h2>Agregar producto</h2>
      <form class="grid cols-4" onsubmit="addProduct(event)">
        <input name="name" placeholder="Nombre" required>
        <input name="category" placeholder="Categoría" required>
        <input name="price" type="number" step="0.01" placeholder="Precio" required>
        <input name="stock" type="number" placeholder="Stock" required>
        <input name="icon" placeholder="Emoji/icono" value="🛒">
        <button class="btn" type="submit">Guardar</button>
      </form>
    </section>` : ''}
    ${productGrid(false)}
  `;
}

function renderCatalog() {
  return `
    <section class="header"><div><p class="eyebrow">Cliente</p><h1>Catálogo</h1></div></section>
    ${productGrid(true)}
  `;
}

function renderClients() {
  return `
    <section class="header"><div><p class="eyebrow">Personas</p><h1>Clientes</h1></div></section>
    ${state.user.role === 'administrador' ? `<section class="panel" style="margin-bottom:18px">
      <h2>Agregar cliente</h2>
      <form class="grid cols-4" onsubmit="addClient(event)">
        <input name="name" placeholder="Nombre" required>
        <input name="email" type="email" placeholder="Correo" required>
        <input name="phone" placeholder="Teléfono" required>
        <button class="btn" type="submit">Guardar</button>
      </form>
    </section>` : ''}
    <div class="table-wrap"><table>
      <thead><tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th></tr></thead>
      <tbody>${state.db.clients.map(c => `<tr><td>${c.id}</td><td>${c.name}</td><td>${c.email}</td><td>${c.phone}</td></tr>`).join('')}</tbody>
    </table></div>
  `;
}

function renderEmployees() {
  return `
    <section class="header"><div><p class="eyebrow">Equipo</p><h1>Empleados</h1></div></section>
    <section class="panel" style="margin-bottom:18px">
      <h2>Agregar empleado</h2>
      <form class="grid cols-4" onsubmit="addEmployee(event)">
        <input name="name" placeholder="Nombre" required>
        <input name="email" type="email" placeholder="Correo" required>
        <input name="position" placeholder="Puesto" required>
        <input name="branch" placeholder="Sucursal" required>
        <button class="btn" type="submit">Guardar</button>
      </form>
    </section>
    <div class="table-wrap"><table>
      <thead><tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Puesto</th><th>Sucursal</th></tr></thead>
      <tbody>${state.db.employees.map(e => `<tr><td>${e.id}</td><td>${e.name}</td><td>${e.email}</td><td>${e.position}</td><td>${e.branch}</td></tr>`).join('')}</tbody>
    </table></div>
  `;
}

function renderSales() {
  return `
    <section class="header"><div><p class="eyebrow">Operación</p><h1>Ventas</h1></div></section>
    <div class="table-wrap"><table>
      <thead><tr><th>ID</th><th>Cliente</th><th>Empleado</th><th>Fecha</th><th>Total</th><th>Estado</th></tr></thead>
      <tbody>${state.db.sales.slice().reverse().map(s => `
        <tr><td>${s.id}</td><td>${getClient(s.clientId)?.name || 'Cliente'}</td><td>${getEmployee(s.employeeId)?.name || 'Venta web'}</td><td>${dateFormat(s.date)}</td><td>${money(s.total)}</td><td>${s.status}</td></tr>
      `).join('')}</tbody>
    </table></div>
  `;
}

function renderPurchases() {
  const sales = state.db.sales.filter(sale => sale.clientId === state.user.clientId).slice().reverse();
  return `
    <section class="header"><div><p class="eyebrow">Cliente</p><h1>Mis compras</h1></div></section>
    <div class="table-wrap"><table>
      <thead><tr><th>Venta</th><th>Producto</th><th>Cantidad</th><th>Fecha</th><th>Total</th></tr></thead>
      <tbody>${sales.map(sale => {
        const details = state.db.saleDetails.filter(d => d.saleId === sale.id);
        return details.map(detail => `<tr><td>${sale.id}</td><td>${getProduct(detail.productId)?.name || 'Producto'}</td><td>${detail.quantity}</td><td>${dateFormat(sale.date)}</td><td>${money(sale.total)}</td></tr>`).join('');
      }).join('') || '<tr><td colspan="5">Todavía no hay compras.</td></tr>'}</tbody>
    </table></div>
  `;
}

function renderRegisterSale() {
  return `
    <section class="header"><div><p class="eyebrow">Empleado</p><h1>Registrar venta</h1></div></section>
    <section class="panel">
      <form class="grid cols-4" onsubmit="event.preventDefault(); buyProduct(this.product.value, this.client.value, this.quantity.value, state.user.employeeId)">
        <select name="client" required>
          ${state.db.clients.map(c => `<option value="${c.id}">${c.name}</option>`).join('')}
        </select>
        <select name="product" required>
          ${state.db.products.map(p => `<option value="${p.id}">${p.name} · stock ${p.stock}</option>`).join('')}
        </select>
        <input name="quantity" type="number" min="1" value="1" required>
        <button class="btn" type="submit">Registrar</button>
      </form>
    </section>
  `;
}

function renderDBView() {
  return `
    <section class="header"><div><p class="eyebrow">Información del sistema</p><h1>Registros</h1></div><button class="btn ghost" onclick="resetDB()">Reiniciar</button></section>
    <section class="panel">
      <p>En esta sección se muestra un resumen interno de la información registrada dentro del sistema, incluyendo usuarios, productos, clientes, empleados y ventas.</p>
      <pre style="white-space:pre-wrap;overflow:auto;background:#020617;border:1px solid var(--border);border-radius:18px;padding:14px;color:#e2e8f0;max-height:520px">${JSON.stringify(state.db, null, 2)}</pre>
    </section>
  `;
}

render();
