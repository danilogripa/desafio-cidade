# iShareLife - Desafio Cidades

A [iShareLife](http://www.isharelife.com.br) est� em busca de um analista web. Portanto elaborou este reposit�rio que cont�m todas as instru��es do desafio para o processo seletivo. Esta � a oportunidade de mostrar todo seu potencial e garantir a vaga. Qualquer d�vida entre em contato (webdev@isharelife.com.br).

##Descri��o
Ao se cadastrar ao nosso site, o usu�rio deve escolher uma cidade, por�m se ele n�o encontr�-la na lista de cidades oficiais, o usu�rio cadastra sua cidade como uma sugest�o, a sugest�o � uma campo aberto para digita��o do usu�rio, isso possibilita o cadastro das sugest�es digitadas de "n" formas. O seu objetivo � padronizar erros de digita��o e abrevia��o associando a sugest�o a uma cidade oficial e a sigla do seu estado caso exista uma correspondente.

##Instru��es
* Todas as tabelas e dados necess�rios para a execu��o do teste se encontra na pasta SQL. Crie um banco de dados chamado isharelife e importe cada um dos arquivos.

* Desenvolva um programa em php para associar a coluna 'name' da tabela de sugest�o de cidades (geodata_city_suggestion) a coluna 'name' de uma cidade oficial (geodata_city) e o seu respectivo estado que se encontra na coluna 'acronym' da Tabela de estados (geodata_region). Como descrito acima pode se observar que a cidade sugerida pelo usu�rio n�o tem tratamento na entrada de dados, portanto o desafio � associar diferente formas de escrita a uma poss�vel cidade oficial. E o resultado da associa��o deve ser guardado na tabela (geodata_city_result) que tamb�m se encontra na pasta SQL.

##Regras
O desenvolvedor ter� total liberdade para implementar sua solu��o. Ser�o avaliados a l�gica de programa��o, estrutura��o e organiza��o do c�digo e arquivos.

Se houver necessidade a estrutura das tabelas podem ser modificadas para cumprir a solu��o do problema.

Caso n�o consiga cumprir a tarefa envie o c�digo com a solu��o mais avan�ada poss�vel.

###Tecnologia
O programa deve ser feito em **PHP** podendo se beneficiar de bibliotecas open source por�m sem a utiliza��o de frameworks (Symfony, Zend, ...) e o banco de dados deve ser **MYSQL**, n�o � permitido o uso de PDOs para se comunicar com o banco de dados.

##Exemplos
Abaixo segue um exemplo de como deve ser a solu��o final na tabela geodata_city_result.

suggestionID, suggestionName -> officialID, officialName , officialAcronym
>134, S. paulo -> 15, S�o Paulo, SP  
>153, Sao P -> 15, S�o Paulo, SP  
>255, S.P -> 15, S�o Paulo, SP  
>361, Rio Janeiro -> 18, Rio de janeiro, RJ  
>754, rio de ajneiro -> 18, Rio de janeiro, RJ 
>...  
etc.

##Enviando seu c�digo
Crie um reposit�rio p�blico no seu github e envie o link para webdev@isharelife.com.br, com as instru��es necess�rias para que possamos executar seu c�digo.