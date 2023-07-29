function setTheme(theme) {
    var element = document.getElementById("theme");
    element.setAttribute("href", "Style/" + theme + ".css");
    localStorage.setItem("theme", theme);
}
var savedTheme = localStorage.getItem("theme");
if (savedTheme) {
    setTheme(savedTheme);
}

  function setTheme(theme) {
    // Set the theme on the page
    if (theme === 'dark') {
      document.body.classList.add('dark');
      document.querySelector('footer').classList.add('dark');
      document.querySelectorAll('.theme button').forEach(btn => btn.classList.add('dark'));
    } else {
      document.body.classList.remove('dark');
      document.querySelector('footer').classList.remove('dark');
      document.querySelectorAll('.theme button').forEach(btn => btn.classList.remove('dark'));
    }
  
    // Send an AJAX request to update the user's theme preference in the database
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'preference.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log('Theme preference updated successfully');
        } else {
          console.error('Error updating theme preference');
        }
      }
    };
    xhr.send('theme=' + encodeURIComponent(theme));

    // Set the theme in the local storage
    localStorage.setItem('theme', theme);

    // Set the theme in the session storage
    if (typeof(Storage) !== 'undefined') {
        sessionStorage.setItem('theme', theme);
    }

    // Set the theme from the session variable if it is set
    if (typeof(Storage) !== 'undefined' && sessionStorage.getItem('theme')) {
        savedTheme = sessionStorage.getItem('theme');
    } else {
        savedTheme = localStorage.getItem('theme');
    }
  }
  
  