document.addEventListener("DOMContentLoaded", () => {
  const livro = document.getElementById("livro");
  const capitulo = document.getElementById("capitulo-atual");
  const texto = document.getElementById("texto-biblico");

  async function carregarCapitulo(ref) {
    livro.textContent = ref.livro;
    capitulo.textContent = ref.capitulo;

    texto.innerHTML = "<div>Carregando…</div>";

    try {
      const resp = await fetch(`/api/bible/?l=${ref.livro}&c=${ref.capitulo}`);
      const data = await resp.json();

      if (data.erro) {
        texto.innerHTML = `<p>${data.erro}</p>`;
        return;
      }

      texto.innerHTML = data.versos
        .map((v) => `<p><span class="v">${v.n}</span> ${v.t}</p>`)
        .join("");
    } catch (err) {
      texto.innerHTML = `<p>Falha ao carregar o capítulo.</p>`;
      console.error(err);
    }
  }

  carregarCapitulo({ livro: "JHN", capitulo: 1 });
});
