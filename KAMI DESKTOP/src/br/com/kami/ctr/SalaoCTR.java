package br.com.kami.ctr;

/**
 * Importando as classes necessárias para trabalhar nesta classe
 */
import java.sql.*;
import br.com.kami.dto.SalaoDTO;
import br.com.kami.dto.CabeleireiroDTO;
import br.com.kami.dao.SalaoDAO;
import br.com.kami.dao.ConexaoDAO;

public class SalaoCTR {
    SalaoDAO salaoDAO = new SalaoDAO();

    /**
     * Método construtor da classe
     */
    public SalaoCTR() {
    }

    public String inserirSalao(SalaoDTO salaoDTO, CabeleireiroDTO cabeleireiroDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (salaoDAO.inserirSalao(salaoDTO, cabeleireiroDTO)) {
                return "Salão Cadastrado com Sucesso!!!";
            } else {
                return "Salão NÃO Cadastrado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Salão NÃO Cadastrado!!!";
        }
    }//Fecha o método inserirSalao

    public String alterarSalao(SalaoDTO salaoDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (salaoDAO.alterarSalao(salaoDTO)) {
                return "Salão Alterado com Sucesso!!!";
            } else {
                return "Salão NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Salão NÃO Alterado!!!";
        }
    }//Fecha o método alterarSalao
    
    public String excluirSalao(SalaoDTO salaoDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (salaoDAO.excluirSalao(salaoDTO)) {
                return "Carro Excluído com Sucesso!!!";
            } else {
                return "Carro NÃO Excluído!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Carro NÃO Excluído!!!";
        }
    }//Fecha o método excluirCarro
    
    //public ResultSet consultarSalao(SalaoDTO salaoDTO, CabeleireiroDTO cabeleireiroDTO, int opcao) {
    public ResultSet consultarSalao(SalaoDTO salaoDTO, CabeleireiroDTO cabeleireiroDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;
        System.out.println(cabeleireiroDTO.getId_cab());
        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        //rs = salaoDAO.consultarSalao(salaoDTO, cabeleireiroDTO, opcao);
        rs = salaoDAO.consultarSalao(salaoDTO,cabeleireiroDTO, opcao);

        return rs;
    }//Fecha o método consultarSalao


    /**
     * Método utilizado para controlar o acesso ao método CloseDB da classe
     * ConexaoDAO
     */
    public void CloseDB() {
        ConexaoDAO.CloseDB();
    }//Fecha o método CloseDB
}//fecha a classe SalaoCTR
