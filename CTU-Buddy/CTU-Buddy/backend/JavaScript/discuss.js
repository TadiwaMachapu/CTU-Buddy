document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('name');
    const questionInput = document.getElementById('question');
    const submitButton = document.getElementById('submit');
    const questionList = document.getElementById('question-list');

    submitButton.addEventListener('click', function () {
        const name = nameInput.value;
        const question = questionInput.value;

        if (name && question) {
            const listItem = document.createElement('li');
            listItem.innerHTML = `<strong>${name}:</strong> ${question}`;
            questionList.appendChild(listItem);

            // Clear inputs after submission
            nameInput.value = '';
            questionInput.value = '';
        }
    });
});
