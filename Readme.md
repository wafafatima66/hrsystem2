

  <h1>💼 HR Management System - Raw PHP</h1>

  <p>This is a full-featured <strong>Human Resource Management System</strong> built using raw PHP and MySQL. It supports multiple user roles and comprehensive modules for managing employees, performance, leaves, and more.</p>

  <h2>👥 User Roles</h2>
  <ul>
    <li><strong>Super Administrator</strong> – Full access to all modules, system settings, and users</li>
    <li><strong>Agency Head</strong> – Manages employees, performance, and reports under their agency</li>
    <li><strong>Division Head</strong> – Oversees specific divisions and approves leaves/performance</li>
    <li><strong>Employee</strong> – Submits leave requests, views evaluations, and manages their profile</li>
  </ul>

  <h2>📦 Key Modules</h2>
  <ul>
    <li>📊 <strong>Dashboard</strong> – Role-specific overview with charts and statistics</li>
    <li>👨‍💼 <strong>Employee Management</strong> – Add, edit, assign roles, and manage records</li>
    <li>📝 <strong>Leave Management</strong> – Apply, approve, and track leave requests</li>
    <li>📈 <strong>Performance Management</strong> – Performance evaluation, score sheets, and comments</li>
    <li>🎓 <strong>Learning & Development</strong> – Training programs and skill tracking</li>
    <li>🧑‍💻 <strong>Hiring & Appointment</strong> – Applicant tracking, job postings, and hiring process</li>
    <li>📑 <strong>Reports Management</strong> – Generate and export HR reports (PDF/CSV)</li>
    <li>🔐 <strong>User Management</strong> – Create roles, set permissions, and manage logins</li>
  </ul>

  <h2>📸 Screenshots</h2>
  <p>Below are some UI previews</p>

  <img src="img/Screenshots/1.png" alt="Dashboard Screenshot">
  <img src="img/Screenshots/2.png" alt="Dashboard Screenshot">
  <img src="img/Screenshots/3.png" alt="Dashboard Screenshot">
  <img src="img/Screenshots/4.png" alt="Dashboard Screenshot">
  <img src="img/Screenshots/5.png" alt="Dashboard Screenshot">
  <img src="img/Screenshots/6.png" alt="Dashboard Screenshot">
  <img src="img/Screenshots/7.png" alt="Dashboard Screenshot">


  <h2>🛠 Tech Stack</h2>
  <ul>
    <li>PHP 8+ (Raw, Procedural & OOP mix)</li>
    <li>MySQL</li>
    <li>Bootstrap 5</li>
    <li>Vanilla JavaScript / jQuery / Ajax</li>
    <li>HTML5 + CSS3</li>
  </ul>

  <h2>⚙️ Setup Instructions</h2>
  <ol>
    <li>Clone the project:
      <pre><code>https://github.com/wafafatima66/Human-resourse-management-system-php-mysql</code></pre>
    </li>
    <li>Place it in your server's web root (e.g., <code>htdocs</code> for XAMPP)</li>
    <li>Create a MySQL database, e.g., <code>hr_system</code></li>
    <li>Import <code>database/hrsystem.sql</code> via phpMyAdmin</li>
    <li>Update your DB credentials in <code>includes/conn.php</code></li>
    <li>Access the system at: <code>http://localhost/hr-php-system</code></li>
  </ol>

  <h2>🔐 Default Logins</h2>
  <pre><code>Super Admin
Email: superadmin@hr.com
Password: admin123

</code></pre>



  <h2>📌 Notes</h2>
  <ul>
    <li>Ensure PHP & MySQL are installed (XAMPP/WAMP recommended)</li>
    <li>File upload and email notifications need proper server config</li>
    <li>Roles and access are enforced using session-based controls</li>
    <li>Extendable module structure – easy to integrate new features</li>
  </ul>

  <h2>📧 Contact</h2>
  <p>If you want to get in touch, feel free to connect via <a href="https://www.linkedin.com/in/fatimaamir99/" target="_blank">LinkedIn</a></p>

  <h3>⭐ If you like this project, please consider starring it on GitHub!</h3>

</body>
</html>
