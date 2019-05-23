const list = document.querySelector('#author-list');
const template = document.querySelector('.template');

for (let i = 1; i < 21; i++) {
    const newItem = template.cloneNode(true);
    newItem.classList.remove('template');
    list.appendChild(newItem);

    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/step3/user/' + i);
    xhr.onload = function() {
        const details = JSON.parse(xhr.response);
        newItem.querySelector('.wrap').classList.add('loaded');
        newItem.querySelector('.name').innerText = details.firstName;
        newItem.querySelector('.lastname').innerText = details.lastName;
        newItem.querySelector('.email').innerText = details.email;
        newItem.querySelector('.birthdate').innerText = details.birthdate.date;
        newItem.querySelector('.id').innerText = '#' + details.id;
    };
    xhr.send();
}
