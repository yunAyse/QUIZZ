console.log('hello world');

// select button
let button = document.querySelector("button[name='responseuser']");

// apres avoir cliqué
  button.addEventListener('click', function (event) {
    event.preventDefault();
    // (j'essaye) je recupere la value de button
    let userResponse = button.value;

    console.log(userResponse);

    
})

