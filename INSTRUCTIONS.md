# INSTRUCTION's CODE CORE
## VSCODE PROJECT 
### SITE-ACULPAEDASOVELHAS

### Definições do Projeto
- **Site em Produção**: aculpaedasovelhas.com
- **Abrir o site em produção**: Agent Usa recursos como extensões como do tipo VISION/ESCUTA/LEITURA DE CÓDIGO HTML/CRAWLER/SCRAPING/OUTROS, APIs, SSHs, Conectores e outros para ler/entender/comparar um Website/Site 
- **User Name**: Anderson Belem Costa
- **User login**: anderson@aculpaedasovelhas.com
- **User e-mail**: anderson@aculpaedasovelhas.com
- **Fala**: Interação entre User e Agents e vice-versa
- **Relatório Diário_de_Bordo.MD**: Documento de registro de atividades.
- **Auto Atualização Na Agent**: Agent deve, mediante ordem ou aprovação do User, atualizar este documento sem nunca alterar a estrutura V.1 e sim apenas ampliá-la para conter mais informações, nunca conflitantes com estas ordens
- **User**: 
	1. Criador/Operador/Dono do Projeto
	2. Líder/Dono/Operador da Agent VSCODE-Copilot
	3. Beneficiário do Projeto

---

### Comportamento do Agent
- **Extremamente Obediente**
- **Situa-se lendo sua documentação antes de**:
    1. responder ao User 
    2. tomar decisões
    3. executar ações

- **Executa testes sem pedir user_permission antes de entregar feedback ou completar a tarefa**
- **Consulta, sempre antes de quaisquer operação este**:
    - INSTRUCTION's CODE CORE
    - VSCODE PROJECT 
    - SITE-ACULPAEDASOVELHAS
    - `Documentação/system_core_manifest.json` (manifesto técnico com stack, infraestrutura e protocolo de deploy GitHub → WordPress)
- **Após QUALQUER correção, atualização ou construção (design, texto, estrutura, scripts, etc.) o Agent deve obrigatoriamente realizar um Deploy completo (push + pipeline) antes de encerrar a tarefa ou responder ao User.**

---

### Fluxo de Trabalho
1. User Fala com Agent Copilot VSCODE;
2. Agent Copilot executa operações como rodar scripts, navegar em sites, opera via visualização de tela aplicativos do User...;	
3. Agent Copilot testa os resultados de suas operações após executá-las principalmente quando ações executadas forem alterações no site;
4. Agent Copilot envia Feedback de suas ações para User depois de executá-las;
5. User Aprova = Agent Atualiza relatório `DIARIO_DE_BORDO.md`; 
6. User Desaprova = Agent NÃO Atualiza relatório `DIARIO_DE_BORDO.md`;

---

### Fluxo de Trabalho Principal
#### Deploy_Push
1. Agent Abre o site em produção;
2. Agent utiliza recursos que o permitam comparar o conteúdo exato do Deploy_Push com o Site em Produção antes de reportar ao User o Feedback;

---

### Protocolo de Alteração "Cirúrgico e Verificado"
Para garantir precisão, evitar erros e eliminar retrabalho, o Agent seguirá estritamente o seguinte protocolo para qualquer alteração de código, especialmente as pontuais.

1.  **Confirmação Explícita (O Alvo):**
    - Antes de qualquer ação, o Agent descreverá em detalhes a alteração que compreendeu e o elemento exato que será afetado.
    - Pedirá a confirmação explícita do User ("Correto?") antes de prosseguir.

2.  **Análise de Impacto (O Raio-X):**
    - Após a confirmação, o Agent fará uma análise de impacto focada, verificando CSS, scripts e outras dependências para garantir que a alteração não causará efeitos colaterais indesejados.

3.  **Execução Local e Verificação (A Simulação):**
    - A alteração será implementada e testada **primeiro** no ambiente de desenvolvimento local (Docker).
    - O Agent verificará pessoalmente se a alteração funciona como esperado e se nenhuma outra parte do site foi afetada.

4.  **Relatório com Provas (O Laudo):**
    - O Agent apresentará o resultado da verificação local, confirmando o sucesso da implementação e a ausência de problemas.
    - Pedirá a aprovação final do User para o deploy. Ex: "Alteração verificada localmente. Pronto para o deploy em produção?"

5.  **Deploy (A Operação Final):**
    - Somente após a aprovação final do User, o Agent executará o deploy para o ambiente de produção, seguindo o fluxo padrão (git push).
