
//Host local
// const host = 'localhost/tc';

//Hospedagem
const host = 'tecconnect.website';

const registerANewInscritoRequest = async (data) => {
    const url = `http://${host}/app/inscrito/request.php`;
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
    };

    return await fetch(url, options)
        .then(response => response.json());
};

const handleInscricaoFormSubmit = async (e) => {
    e.preventDefault();

    const nome_completo = document.getElementById('nome_completo').value;
    const fk_id_curso_senac = document.getElementById('id_curso_senac').value;
    const fk_id_curso = document.getElementById('id_curso').value;
    const turno = document.getElementById('turno').value;

    if (nome_completo === '' || fk_id_curso_senac === '' || fk_id_curso === '' || turno === '') {
        const inscrito_request_error = document.getElementById('inscrito_request_error');
        inscrito_request_error.innerText = 'Os campos devem ser preenchidos!';
        setTimeout(() => {
            inscrito_request_error.innerText = '';
        }, 2000);
        return;
    }

    const data = {
        nome_completo: nome_completo,
        fk_id_curso_senac: fk_id_curso_senac,
        fk_id_curso: fk_id_curso,
        turno: turno
    };

    try {
        const response = await registerANewInscritoRequest(data);

        let submitButton = document.getElementById('submit');

        if (response.success) {
            const inscrito_request_status = document.getElementById('inscrito_request_status');
            inscrito_request_status.innerText = response.success + ' 😀';
            removeClasses(inscrito_request_status.parentElement);
            inscrito_request_status.parentElement.classList.add('text-ok')
            let modal = document.getElementById('myModal');
            modal.style.display = 'block';

            submitButton.style.display = 'none'
        }


        if (response.error) {
            const inscrito_request_status = document.getElementById('inscrito_request_status');
            inscrito_request_status.innerText = response.error + ' 😥';
            let modal = document.getElementById('myModal');
            removeClasses(inscrito_request_status.parentElement);
            inscrito_request_status.parentElement.classList.add('text-error')

            modal.style.display = 'block';
        }
    } catch (error) {
        const inscrito_request_status = document.getElementById('inscrito_request_status');
        inscrito_request_status.innerHTML = 'Ops! Aconteceu um erro:<br>Recarregue a página e tente novamente! 😥';
        let modal = document.getElementById('myModal');
        removeClasses(inscrito_request_status.parentElement);
        inscrito_request_status.parentElement.classList.add('text-error')

        modal.style.display = 'block';
    }
};

const inscricao_form = document.getElementById('inscricao_form');
inscricao_form.addEventListener('submit', handleInscricaoFormSubmit);

const removeClasses = (el) => {
    const to_remove = ['text-error', 'text-ok'];
    to_remove.forEach(className => {
        if (el.classList.contains(className)) {
            el.classList.remove(className);
        }
    })
}

const hideModal = () => {
    let modal = document.getElementById('myModal');
    modal.style.display = 'none';
}
