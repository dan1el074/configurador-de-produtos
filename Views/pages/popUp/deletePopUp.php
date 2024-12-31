
<script>
    setTimeout(() => {
        let body = document.querySelector('body')

        body.innerHTML += `
            <div class="black-background"></div>
            <div class="pop-up">
                <form class="delete-pop-up_form" method="post">
                    <span>Deseja mesmo deletar <br><b><?= $object->getName() ?>?</b></span>
                    <div class="button-content">
                        <button name="confirmDelete" value="<?= get_class($object) . ',' . $object->getId() ?>" type="submit">Deletar</button>
                        <button name="cancelDelete" type="submit">Cancelar</button>
                    </div>
                <form> 
            </div>
        `

        const background = document.querySelector('.black-background')
        const popUp = document.querySelector('.pop-up')
        background.addEventListener("click", () => {
            background.remove();
            popUp.remove()
        })

        const cancelBtn = document.querySelector('button[name="cancelDelete"]')
        cancelBtn.addEventListener("click", () => {
            background.remove();
            popUp.remove()
        })
    }, 10);
</script>
