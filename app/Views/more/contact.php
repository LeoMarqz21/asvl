<div class="row mt-4 pl-2">
    <!-- modify this form HTML and place wherever you want your form -->
    <form class="col-sm-5 card rounded p-4" id="my-form" action="https://formspree.io/f/mbjqepvo" method="POST">
        <label>Ingresa tu email:</label>
        <input class="form-control form-control-sm" type="email" name="email" placeholder="ejemplo@gmail.com" />
        <label class="mt-3">Ingresa tu mensaje</label>
        <input class="form-control form-control-sm" type="text" name="message" placeholder="podrias...?" />
        <button class="mt-4 btn btn-primary" id="my-form-button">Enviar</button>
        <p class="bg-secondary mt-3 text-primary" id="my-form-status"></p>
    </form>

</div>

<!-- Place this script at the end of the body tag -->
<script>
    var form = document.getElementById("my-form");

    async function handleSubmit(event) {
        event.preventDefault();
        var status = document.getElementById("my-form-status");
        var data = new FormData(event.target);
        fetch(event.target.action, {
            method: form.method,
            body: data,
            headers: {
                'Accept': 'application/json'
            }
        }).then(response => {
            if (response.ok) {
                status.innerHTML = "Thanks for your submission!";
                form.reset()
            } else {
                response.json().then(data => {
                    if (Object.hasOwn(data, 'errors')) {
                        status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
                    } else {
                        status.innerHTML = "Oops! There was a problem submitting your form"
                    }
                })
            }
        }).catch(error => {
            status.innerHTML = "Oops! There was a problem submitting your form"
        });
    }
    form.addEventListener("submit", handleSubmit)
</script>