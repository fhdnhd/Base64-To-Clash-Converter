<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./src/css/bootstrap.css" />
    <script src="./src/js/script.js"></script>
    <title>Clash vmess decode</title>
  </head>

  <body class="bg-body-secondary">
    <div class="container bg-body-tertiary px-4 py-2 my-5 shadow-lg rounded-2">
      <div class="h1 my-4 fw-bold text-body">Base64 To Clash Converter</div>
      <form action="#" method="POST">
        <div><label class="form-label" for="data">Proxies : </label></div>
        <textarea
          class="form-control form-control-sm"
          id="data"
          name="data"
          rows="10"
        ></textarea
        ><br />
        <div>
          <button class="btn btn-success btn-sm" name="generate" id="generate">
            Generate
          </button>
        </div>
      </form>
      <div class="d-flex gap-2 my-3">
        <div>
          <button
            class="btn btn-secondary btn-sm"
            name="copy"
            id="copy"
            onclick="copy()"
            disabled
          >
            Copy to Clipboard
          </button>
        </div>
        <form action="#" method="POST">
          <div class="d-flex gap-2">
            <div class="input-group input-group-sm">
              <input
                class="form-control form-control-sm"
                type="text"
                name="namafile"
                id="namafile"
                placeholder="Nama File"
                disabled
              />
              <span class="input-group-text">.yaml</span>
            </div>
            <button
              class="btn btn-secondary btn-sm text-nowrap"
              name="buatfile"
              id="buatfile"
              disabled
            >
              Buat File Baru
            </button>
          </div>
        </form>
      </div>
      <div>
        <div>Output :</div>
        <div>
          <textarea
            class="form-control form-control-sm my-3"
            id="output"
            name="output"
            rows="10"
            readonly
          ></textarea>
        </div>
      </div>
    </div>

    <div class="toast-container fixed-bottom bottom-0 end-0 p-2">
      <div
        class="toast"
        id="toast"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div id="isi-toast" class="toast-body"></div>
      </div>
      <script src="./src/js/bootstrap.bundle.js"></script>
    </div>
    <a
      class="p-3 link-underline link-opacity-50-hover link-underline-opacity-0"
      href="https://github.com/fhdnhd/Base64-To-Clash-Converter"
      >https://github.com/fhdnhd/Base64-To-Clash-Converter</a
    >
  </body>
</html>
<?php include './src/php/controller.php'; ?>
