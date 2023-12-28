
const vagas_em_tempo_real = () => {
    const url = "http://localhost/tc/app/vagas/all.php";
    fetch(url)
        .then(response => response.json())
        .then(curso => {
            let vagas_em_tempo_real_button = document.getElementById('vagas_em_tempo_real_button');
            let vagas_em_tempo_real_data = document.getElementById('vagas_em_tempo_real_data');
            
            vagas_em_tempo_real_button.style.display = 'none';
            vagas_em_tempo_real_data.innerHTML = '';
            let li = '';

            for (let index = 0; index < curso.length; index++) {
                let nome = curso[index].nome_curso;
                let vagas_disponiveis = curso[index].vagas_disponiveis;
                li += `<tr><td class='mx-2'>${nome}</td><td class="text-center">${vagas_disponiveis}</td></tr>`;
            }
            vagas_em_tempo_real_data.insertAdjacentHTML('beforeend', li);


            const changeColor = (color) => {
                let dados = vagas_em_tempo_real_data.querySelectorAll('td')
                dados.forEach((td) => {
                    td.style.transition = 'all ease .5s';
                    td.style.color = color;
                })
            }
            changeColor('green');
            setTimeout(() => {
                changeColor('black');
            }, 500);

            setTimeout(() => {
                vagas_em_tempo_real_button.style.display = 'block';
            }, 5000);
        })
        .catch(error => {
            vagas_em_tempo_real_data.innerHTML = '<tr><td colspan="2" style="color: red;">Sem Resultados.</td></tr>';
            setTimeout(() => {
                let td = vagas_em_tempo_real_data.querySelector('td')
                td.style.transition = 'all ease 1s';
                td.style.color = 'black';
            }, 200);
        });
}


const verificar_vagas = (el, id_curso) => {
    const url = `http://localhost/tc/app/vagas/id.php?id_curso=${id_curso}`;

    el.classList.add('disabled');

    let p_error = document.getElementById(`status_request_verificar_vagas_curso_${id_curso}`);
    let p_success = document.getElementById(`status_request_verificar_vagas_curso_${id_curso}`);

    fetch(url)
        .then(response => response.json())
        .then(numVagas => {

            let vagas_disponiveis = numVagas;
            if (vagas_disponiveis === 0) {
                el.classList.toggle('btn-danger');
                p_error.classList.add('text-danger');
                p_error.textContent = 'Sem vagas disponíveis. :(';

                setTimeout(() => {
                    p_error.textContent = '';
                    el.classList.remove('btn-danger');
                    el.classList.remove('disabled');
                }, 3000)
                return;
            }

            el.classList.toggle('d-none');
            document.getElementById('inscricao_curso_' + id_curso).classList.toggle('d-none');
            p_success.classList.add('text-success');
            p_success.textContent = 'Pode se Inscrever-se';
        })
        .catch(error => {
            el.classList.toggle('btn-danger');
            p_error.classList.add('text-danger');
            p_error.textContent = error.message;
            p_error.textContent = "falha na obtenção deste dado.";

            setTimeout(() => {
                p_error.textContent = '';
                el.classList.remove('btn-danger');
                el.classList.remove('disabled');
            }, 3000)
        });
}