/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.kami.dao;

import br.com.kami.dto.CabeleireiroDTO;
import java.sql.*;

/**
 *
 * @author Cauã e Júlia
 */
public class CabeleireiroDAO {

    public CabeleireiroDAO() {
    }

    private ResultSet rs = null;

    private Statement stmt = null;

    public boolean inserirCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            ConexaoDAO.ConectBD();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Insert into Cabeleireiro (nomeCab, emailCab, senhaCab) values ("
                    + "'" + cabeleireiroDTO.getNomeCab() + "', '" + cabeleireiroDTO.getEmailCab() + "', " 
                    + "crypt('"+ cabeleireiroDTO.getSenhaCab() +"',gen_salt('bf', 8)))";

           /* String comando = "Insert into Cabeleireiro (nomeCab, emailCab, senhaCab) values ("
                    + "'" + cabeleireiroDTO.getNomeCab() + "', '" + cabeleireiroDTO.getEmailCab() + "', "
                    + "crypt('" + cabeleireiroDTO.getSenhaCab() + "',gen_salt('bf', 8)))";
           */
           
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
    }//Fecha o método inserirCabeleireiro

    public boolean excluirCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            ConexaoDAO.ConectBD();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Delete from Cabeleireiro "
                    + "Where id_cab = " + cabeleireiroDTO.getId_cab();

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
    }//Fecha o método deletarCabeleireiro

    public boolean alterarCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            ConexaoDAO.ConectBD();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Update Cabeleireiro set "
                    + "nomeCab = '" + cabeleireiroDTO.getNomeCab() + "', "
                    + "emailCab = " + cabeleireiroDTO.getEmailCab() + ", "
                    + "senhaCab = '" + cabeleireiroDTO.getSenhaCab() + "' "
                    + "where id_cab = " + cabeleireiroDTO.getId_cab();

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
    }//Fecha o método alterarCabeleireiro

    public ResultSet consultarCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectBD();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados

            String comando = "Select * "
                    + "from Cabeleireiro "
                    + "where id_cab = " + cabeleireiroDTO.getId_cab();

            //Executa o comando SQL no banco de Dados
            rs = stmt.executeQuery(comando);
            return rs;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }

    }//Fecha o método consultarCabeleireiro    

    public int logarCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            ConexaoDAO.ConectBD();
            stmt = ConexaoDAO.con.createStatement();
            String comando = "Select id_cab "
                    + "from cabeleireiro "
                    + "where emailCab = '" + cabeleireiroDTO.getEmailCab() + "'"
                    + " and senhaCab = crypt('"+ cabeleireiroDTO.getSenhaCab() +"', senhaCab)";
            System.out.println(comando);
            rs = null;
            rs = stmt.executeQuery(comando);
            if (rs.next()) {
                return rs.getInt("id_cab");
            } else {
                return 0;
            }

        } catch (Exception e) {
            System.out.println(e.getMessage());
            return 0;
        } finally {
            ConexaoDAO.CloseDB();
        }
    }

}//Fecha a classe CabeleireiroDAO
