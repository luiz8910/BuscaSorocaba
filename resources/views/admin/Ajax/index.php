<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>

    <body>
        <main>
            <section class="container">
                <h1>Ajax Request with JQuery</h1>

                <span id="msg"></span>

                <form id="AjaxRequest">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="tel" placeholder="Telefone">
                    </div>

                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </section>
        </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>