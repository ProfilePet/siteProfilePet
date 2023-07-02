# Profile Pet
Sobre
O intuito do projeto é facilitar a vida de tutores que tem mais de um animal de estimação, ajudando no controle da saúde de cada animal separadamente, juntando todas as informações em um local só.

Funcionalidades
Perfil do Animal: É uma função usada para guardar informações sobre o Pet, informações como nome, espécie, raça e data de nascimento. E esse perfil posteriormente irá vincular todas as outras funcionalidades ao perfil deste animal.

Controle de Medicações e Vacinações: É uma função usada para guardar informações sobre as medições que o Pet está tratando, assim mostrando em um local só, o histórico de medicações que já foram tratadas, o período no qual elas foram tratadas, e a frequência diária que o medicamento foi aplicado.

Controle de Consultas: É a funcionalidade usada para armazenar local, data e hora das consultas onde o Pet já passou ou vai passar no futuro.

Como Rodar o Projeto?
Para rodar o projeto será nescessário a utilização de um localhost, recomendamos que utilize o USBWebService, com o localhost pronto você deve:

Pegar a pasta siteProfilePet e copiar para o diretório raiz do seu localhost.
Crie um banco de dados MySQL local, nós recomendamos que use o phpMyAdmim, mas nada impede de usar o MySQL workbench.
Criar um banco, recomendamos que o nome seja 'bdProfile' caso queira outro nome, recomendo que mude o valor da variável '$banco' no arquivo 'conn.php'
Execute o Script 'bdProfilePet.sql'
Verifique se seu SGBD possui Usuário e Senha, caso tenha mude os valores das variáveis '$user' e '$pass' para os Usuários e Senhas do seu SGBD
Agora o projeto está pronto para ser acessado via localhost
Autores
@nicolasrodrigues23
@gustavoeric
@LaisTauany11