/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.kami.dao;
import br.com.kami.dto.ClienteDTO;
import java.sql.*;

/**
 *
 * @author Cauã e Júlia
 */

public class ClienteDAO {
    
    public ClienteDAO() {        
    }
    
    private ResultSet rs = null;
    
    private Statement stmt = null;
    
    public boolean inserirCliente(ClienteDTO clienteDTO) {
        try {
            ConexaoDAO.ConectBD();
            
            stmt = ConexaoDAO.con.createStatement();
            
            String comando = "Insert into Cliente (nomeCli, emailCli, telefoneCli, senhaCli) values ("
                    + "'" + clienteDTO.getNomeCli() + "', '" + clienteDTO.getEmailCli() + "', '"
                    + clienteDTO.getTelefoneCli() + "', " + "crypt('"+ clienteDTO.getSenhaCli() +"',gen_salt('bf', 8)))";
            
            stmt.execute(comando);
            
            ConexaoDAO.con.commit();
            
            stmt.close();
            
            return true;
        }//Fecha o try
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        }//Fecha o catch
        finally {
            ConexaoDAO.CloseDB();
        }//Fecha o finally
    }//Fecha o método inserirCliente
    
    public boolean excluirCliente(ClienteDTO clienteDTO) {
        try {
            ConexaoDAO.ConectBD();
            
            stmt = ConexaoDAO.con.createStatement();
            
            String comando = "Delete from Cliente " +
                      "Where id_cli = " + clienteDTO.getId_cli();
            
            stmt.execute(comando);
            
            ConexaoDAO.con.commit();
            
            stmt.close();
            
            return true;
        }//Fecha o try
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        }//Fecha o catch
        finally {
            ConexaoDAO.CloseDB();
        }//Fecha o finally
    }//Fecha o método deletarCliente
    
     public boolean alterarCliente(ClienteDTO clienteDTO) {
        try {
            ConexaoDAO.ConectBD();
            
            stmt = ConexaoDAO.con.createStatement();
            
            String comando = "Update Cliente set "
                    + "nomeCli = '" +clienteDTO.getNomeCli() + "', "
                    + "emailCli = '" + clienteDTO.getEmailCli() + "', "
                    + "telefoneCli = '" + clienteDTO.getTelefoneCli() + "', "
                    + "senhaCli = md5('" + clienteDTO.getSenhaCli() + "') "
                    + "where id_cli = " + clienteDTO.getId_cli();
            
            stmt.execute(comando);
            
            ConexaoDAO.con.commit();
            
            stmt.close();
            
            return true;
        }//Fecha o try
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        }//Fecha o catch
        finally {
            ConexaoDAO.CloseDB();
        }//Fecha o finally
    }//Fecha o método alterarCliente
     
   public ResultSet consultarCliente(ClienteDTO clienteDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectBD();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
             String comando = "";
             
            switch (opcao){
                case 1:
                    comando = "Select * "+
                              "from Cliente "+
                              "where nomeCli ilike '" + clienteDTO.getNomeCli() + "%' " +
                              "order by nomeCli";
                    
                break;
                case 2:
                    comando = "Select * "+
                              "from Cliente " +
                              "where id_cli = " + clienteDTO.getId_cli();
                break;
            }

            //Executa o comando SQL no banco de Dados
            rs = stmt.executeQuery(comando);
            return rs;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }
    }//Fecha o método consultarCliente       
}//Fecha a classe ClienteDAO