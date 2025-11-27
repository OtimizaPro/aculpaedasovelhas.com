document.addEventListener("DOMContentLoaded", () => {
  const livroEl = document.getElementById("nb-livro");
  const capEl = document.getElementById("nb-capitulo");
  const texto = document.getElementById("nb-texto");

  async function carregarCapitulo(ref) {
    livroEl.textContent = ref.livro;
    capEl.textContent = ref.capitulo;

    texto.innerHTML = "<div>Carregando…</div>";

    try {
      const url = `/wp-json/anbible/v1/capitulo?livro=${ref.livro}&cap=${ref.capitulo}`;
      const resp = await fetch(url);
      const data = await resp.json();

      if (data.erro) {
        texto.innerHTML = `<p>${data.erro}</p>`;
        return;
      }

      texto.innerHTML = data.versos
        .map((v) => `<p><span class="v">${v.n}</span> ${v.t}</p>`)
        .join("");
    } catch (error) {
      texto.innerHTML = "<p>Não foi possível carregar o capítulo.</p>";
      console.error(error);
    }
  }

  carregarCapitulo({ livro: "JHN", capitulo: 1 });
});
