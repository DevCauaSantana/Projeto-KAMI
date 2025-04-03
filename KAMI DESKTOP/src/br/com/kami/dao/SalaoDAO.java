/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.kami.dao;

import br.com.kami.dto.SalaoDTO;
import br.com.kami.dto.CabeleireiroDTO;
import java.sql.*;

/**
 *
 * @author Cauã e Júlia
 */
public class SalaoDAO {
    CabeleireiroDTO cabeleireiroDTO = new CabeleireiroDTO(); //Cria um objeto carroDTO
    

    public SalaoDAO() {
        this.cabeleireiroDTO = cabeleireiroDTO;
    }

    private ResultSet rs = null;

    private Statement stmt = null;

    public boolean inserirSalao(SalaoDTO salaoDTO, CabeleireiroDTO cabeleireiroDTO) {
        try {
            ConexaoDAO.ConectBD();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Insert into Salao (nomeSalao, telefoneSalao, urlfoto, cidadeSalao, ruaSalao, bairroSalao, numSalao, id_cab) values ("
                    + "'" + salaoDTO.getNomeSalao() + "', '" + salaoDTO.getTelefoneSalao() + "', '" + salaoDTO.getUrlfoto() + "', '" + salaoDTO.getCidadeSalao() + "', '"
                    + salaoDTO.getRuaSalao() + "', '" + salaoDTO.getBairroSalao() + "', '" + salaoDTO.getNumSalao() + "', '"
                    + cabeleireiroDTO.getId_cab() + "') ";

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
    }//Fecha o método inserirSalao

    public boolean excluirSalao(SalaoDTO salaoDTO) {
        try {
            ConexaoDAO.ConectBD();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Delete from Salao "
                    + "Where id_salao = " + salaoDTO.getId_salao();

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
    }//Fecha o método deletarSalao

    public boolean alterarSalao(SalaoDTO salaoDTO) {
        try {
            ConexaoDAO.ConectBD();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Update Salao set "
                    + "nomeSalao = '" + salaoDTO.getNomeSalao() + "', "
                    + "telefoneSalao = '" + salaoDTO.getTelefoneSalao() + "', "
                    + "urlfoto = '" + salaoDTO.getUrlfoto() + "', "
                    + "cidadeSalao = '" + salaoDTO.getCidadeSalao() + "', "
                    + "ruaSalao = '" + salaoDTO.getRuaSalao() + "', "
                    + "bairroSalao = '" + salaoDTO.getBairroSalao() + "', "
                    + "numSalao = '" + salaoDTO.getNumSalao() + "' "
                    + "where id_salao = " + salaoDTO.getId_salao();

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
    }//Fecha o método alterarSalao

    public ResultSet consultarSalao(SalaoDTO salaoDTO, CabeleireiroDTO cabeleireiroDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectBD();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados

            String comando = "";

            switch (opcao) {
                case 1:
                    comando = "Select s.*, c.nomeCab " +
                              "from Salao s, Cabeleireiro c " + 
                              "where s.id_cab =" + cabeleireiroDTO.getId_cab() + " and " +
                              "s.id_cab = c.id_cab and " +
                              "s.nomeSalao ilike '" + salaoDTO.getNomeSalao()+ "%' " +
                              "order by s.nomeSalao";
                    break;
                case 2:
                    comando = "Select * "
                            + "from Salao "
                            + "where id_salao = " + salaoDTO.getId_salao();
                    break;
            }
System.out.println(comando);
            //Executa o comando SQL no banco de Dados
            rs = stmt.executeQuery(comando);
            return rs;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }
    }//Fecha o método consultarSalao       
}//Fecha a classe SalaoDAO
