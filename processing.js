document.addEventListener('DOMContentLoaded', () => {
  const processBtn = document.getElementById('process');
  processBtn.onclick = () => {
    processBtn.innerHTML = 'Processing...';
  }
})