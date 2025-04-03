package br.com.kami.ctr;

/**
 * Importando as classes necessárias para trabalhar nesta classe
 */
import java.sql.ResultSet;
import br.com.kami.dto.CabeleireiroDTO;
import br.com.kami.dao.CabeleireiroDAO;
import br.com.kami.dao.ConexaoDAO;

public class CabeleireiroCTR {

    CabeleireiroDAO cabeleireiroDAO = new CabeleireiroDAO();

    /**
     * Método construtor da classe
     */
    public CabeleireiroCTR() {
    }

    public String inserirCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (cabeleireiroDAO.inserirCabeleireiro(cabeleireiroDTO)) {
                return "Cabeleireiro Cadastrado com Sucesso!!!";
            } else {
                return "Cabeleireiro NÃO Cadastrado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.		
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Cabeleireiro NÃO Cadastrado!!!";
        }
    }//Fecha o método inserirCabeleireiro

    public String alterarCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (cabeleireiroDAO.alterarCabeleireiro(cabeleireiroDTO)) {
                return "Cabeleireiro Alterado com Sucesso!!!";
            } else {
                return "Cabeleireiro NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Cabeleireiro NÃO Alterado!!!";
        }
    }//Fecha o método alterarCabeleireiro

    public String exluirCarro(CabeleireiroDTO cabeleireiroDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (cabeleireiroDAO.excluirCabeleireiro(cabeleireiroDTO)) {
                return "Cabeleireiro Excluído com Sucesso!!!";
            } else {
                return "Cabeleireiro NÃO Excluído!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Cabeleireiro NÃO Excluído!!!";
        }
    }//Fecha o método deletarCabeleireiro

    public ResultSet consultarCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        rs = cabeleireiroDAO.consultarCabeleireiro(cabeleireiroDTO);

        return rs;
    }//Fecha o método consultarCabeleireiro

    /**
     * Método utilizado para controlar o acesso ao método CloseDB da classe
     * ConexaoDAO
     */
    public void CloseDB() {
        ConexaoDAO.CloseDB();
    }//Fecha o método CloseDB

    public int logarCabeleireiro(CabeleireiroDTO cabeleireiroDTO) {
        return cabeleireiroDAO.logarCabeleireiro(cabeleireiroDTO);
    }//Fecha o método logarCabeleireiro

}//Fecha a classe CabeleireiroCTR
