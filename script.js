const shortLink = document.querySelector('span');
const copyBtn = document.querySelector('.copyBtn');
const linkForCopy = document.getElementById('link');

if (!shortLink.textContent) {
  shortLink.hidden = true;
}

if (linkForCopy) {
  copyBtn.addEventListener('click', function (event) {
    event.preventDefault();
    navigator.clipboard.writeText(linkForCopy.innerText);
  });
}
