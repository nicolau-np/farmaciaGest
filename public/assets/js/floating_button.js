const popup = document.querySelector('.chat-popup');
const chatBtn = document.querySelector('.chat-btn');
const submitBtn = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElm = document.querySelector('input');
const emojiBtn = document.querySelector('#emoji-btn');
const picker = new EmojiButton();


// Emoji selection
window.addEventListener('DOMContentLoaded', () => {

    picker.on('emoji', emoji => {
        var valor = document.getElementById('text_val');

        valor.value += emoji;
    });

    emojiBtn.addEventListener('click', () => {
        picker.togglePicker(emojiBtn);
    });
});

//   chat button toggler

chatBtn.addEventListener('click', () => {
    popup.classList.toggle('show');
})

// send msg
submitBtn.addEventListener('click', () => {
    var valor = document.getElementById('text_val');
    let userInput = valor.value;

    let temp = `<div class="out-msg">
    <span class="my-msg">${userInput}</span>
    <img src="assets/client/uploads/user.png" class="avatar">
    </div>`;

    chatArea.insertAdjacentHTML("beforeend", temp);
    valor.value = '';

})

$(function() {
            const $btnsAddCourse = $('[btn-add-email]').on('click', addCourse)

            let error = false;

            function addCourse(e) {
                let html = `
          <div class="alert alert-${ (!error ? 'success' : 'danger') } alert-dismissible fixed-top fade show" role="alert">
              ${ (!error ? `
                  <strong>Sucesso!</strong> Cadastro efetuado.
              ` : ` <strong>Erro!</strong> Deu ruim. `) }

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      `

      $('body').append(html)

      $('#modalCadastrarCurso').modal('hide')

      let intervalo = setTimeout(function(){
          console.log('intervalo')
          $('.alert').alert('close')
      }, 3000)
      $('.alert').on('close.bs.alert', function(){
          console.log('close')
          clearInterval(intervalo)
      })
  }
})
