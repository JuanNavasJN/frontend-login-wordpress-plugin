window.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('#signin');
  const msg = document.querySelector('.msg');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const data = new FormData(form);
    const dataParsed = new URLSearchParams(data);

    fetch(`${plz.rest_url}/login`, {
      method: 'POST',
      body: dataParsed
    })
      .then(res => res.json())
      .then(json => {
        console.log(json);

        if (!json.message) {
          window.location.href = plz.home_url;
        } else {
          msg.innerHTML = json?.message || '';
        }
      })
      .catch(err => {
        console.log(`There is an error: ${err}`);
      });
  });
});
