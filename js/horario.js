

const horario_inicio = document.querySelector('#horario_inicio');
const horario_fim = document.querySelector('#horario_fim');


horario_inicio.addEventListener('input', () => {
    // Verifica se o horário de início não está vazio
    if (horario_inicio.value) {
        // Cria um objeto Date com o horário de início
        const inicio = new Date(`1970-01-01T${horario_inicio.value}:00`);

        // Adiciona duas horas ao horário de início
        inicio.setHours(inicio.getHours() + 2);

        // Formata o horário de fim com o novo valor
        const fim = `${inicio.getHours().toString().padStart(2, '0')}:${inicio.getMinutes().toString().padStart(2, '0')}`;

        // Atualiza o valor do campo horario_fim
        horario_fim.value = fim;
    } else {
        // Se o horário de início estiver vazio, limpa o campo de horário de fim
        horario_fim.value = '';
    }
});