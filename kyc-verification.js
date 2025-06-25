document.addEventListener('DOMContentLoaded', () => {
  (function loadDOC() {
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('kycFields').innerHTML = this.responseText;
      }
    }
    xmlHttp.open('GET', 'kyc-auth.php', true);
    xmlHttp.send();
  })();
})