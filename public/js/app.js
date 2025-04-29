/**
 * public/js/app.js
 * Basic JavaScript for the Admin Portal:
 *  - Auto-dismiss alerts
 *  - Confirm deletion on forms
 *  - (Optional) Mobile nav toggle
 */

document.addEventListener('DOMContentLoaded', function () {
    // Auto‐hide alert messages after 5 seconds
    document.querySelectorAll('.alert').forEach(function (alert) {
      setTimeout(function () {
        alert.style.transition = 'opacity 0.5s ease';
        alert.style.opacity = '0';
        setTimeout(function () {
          alert.remove();
        }, 500);
      }, 5000);
    });
  
    // Confirm before deleting (add data-confirm-delete to your delete forms)
    document.querySelectorAll('form[data-confirm-delete]').forEach(function (form) {
      form.addEventListener('submit', function (e) {
        if (!confirm('Are you sure you want to delete this item?')) {
          e.preventDefault();
        }
      });
    });
  
    // Example: mobile menu toggle (if you add a nav toggle button)
    const toggleBtn = document.getElementById('nav-toggle');
    const navMenu   = document.getElementById('nav-menu');
    if (toggleBtn && navMenu) {
      toggleBtn.addEventListener('click', function () {
        navMenu.classList.toggle('hidden');
      });
    }
  });
  
