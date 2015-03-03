# iShareLife - Desafio Cidades

A [iShareLife](http://www.isharelife.com.br) está em busca de um analista web. Portanto elaborou este repositório que contém todas as instruções do desafio para o processo seletivo. Esta é a oportunidade de mostrar todo seu potencial e garantir a vaga. Qualquer dúvida entre em contato (webdev@isharelife.com.br).

##Descrição
Ao se cadastrar ao nosso site, o usuário deve escolher uma cidade, porém se ele não encontrá-la na lista de cidades oficiais, o usuário cadastra sua cidade como uma sugestão, a sugestão é uma campo aberto para digitação do usuário, isso possibilita o cadastro das sugestões digitadas de "n" formas. O seu objetivo é padronizar erros de digitação e abreviação associando a sugestão a uma cidade oficial e a sigla do seu estado caso exista uma correspondente.

##Instruções
* Todas as tabelas e dados necessários para a execução do teste se encontra na pasta SQL. Crie um banco de dados chamado isharelife e importe cada um dos arquivos.

* Desenvolva um programa em php para associar a coluna 'name' da tabela de sugestão de cidades (geodata_city_suggestion) a coluna 'name' de uma cidade oficial (geodata_city) e o seu respectivo estado que se encontra na coluna 'acronym' da Tabela de estados (geodata_region). Como descrito acima pode se observar que a cidade sugerida pelo usuário não tem tratamento na entrada de dados, portanto o desafio é associar diferente formas de escrita a uma possível cidade oficial. E o resultado da associação deve ser guardado na tabela (geodata_city_result) que também se encontra na pasta SQL.

##Regras
O desenvolvedor terá total liberdade para implementar sua solução. Serão avaliados a lógica de programação, estruturação e organização do código e arquivos.

Se houver necessidade a estrutura das tabelas podem ser modificadas para cumprir a solução do problema.

Caso não consiga cumprir a tarefa envie o código com a solução mais avançada possível.

###Tecnologia
O programa deve ser feito em **PHP** podendo se beneficiar de bibliotecas open source porém sem a utilização de frameworks (Symfony, Zend, ...) e o banco de dados deve ser **MYSQL**, não é permitido o uso de PDOs para se comunicar com o banco de dados.

##Exemplos
Abaixo segue um exemplo de como deve ser a solução final na tabela geodata_city_result.

suggestionID, suggestionName -> officialID, officialName , officialAcronym
>134, S. paulo -> 15, São Paulo, SP  
>153, Sao P -> 15, São Paulo, SP  
>255, S.P -> 15, São Paulo, SP  
>361, Rio Janeiro -> 18, Rio de janeiro, RJ  
>754, rio de ajneiro -> 18, Rio de janeiro, RJ 
>...  
etc.

##Enviando seu código
Crie um repositório público no seu github e envie o link para webdev@isharelife.com.br, com as instruções necessárias para que possamos executar seu código.