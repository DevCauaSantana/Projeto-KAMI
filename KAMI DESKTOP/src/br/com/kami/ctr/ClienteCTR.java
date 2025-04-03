package br.com.kami.ctr;

/**
 * Importando as classes necessárias para trabalhar nesta classe
 */
import java.sql.ResultSet;
import br.com.kami.dto.ClienteDTO;
import br.com.kami.dao.ClienteDAO;
import br.com.kami.dao.ConexaoDAO;

public class ClienteCTR {
    ClienteDAO clienteDAO = new ClienteDAO();

    /**
     * Método construtor da classe
     */
    public ClienteCTR() {
    }

    public String inserirCliente(ClienteDTO clienteDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (clienteDAO.inserirCliente(clienteDTO)) {
                return "Cliente cadastrado com Sucesso!!!";
            } else {
                return "Cliente NÃO Cadastrado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.		
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Cliente NÃO Cadastrado!!!";
        }
    }//Fecha o método inserirCliente

    public String alterarCliente(ClienteDTO clienteDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (clienteDAO.alterarCliente(clienteDTO)) {
                return "Cliente alterado com Sucesso!!!";
            } else {
                return "Cliente NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Cliente NÃO Alterado!!!";
        }
    }//Fecha o método alterarCliente

    public String excluirCliente(ClienteDTO clienteDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (clienteDAO.excluirCliente(clienteDTO)) {
                return "Cliente excluído com Sucesso!!!";
            } else {
                return "Cliente NÃO Excluído!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Cliente NÃO Excluído!!!";
        }
    }//Fecha o método deletarCliente
    
    public ResultSet consultarCliente(ClienteDTO clienteDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        rs = clienteDAO.consultarCliente(clienteDTO, opcao);

        return rs;
    }//Fecha o método consultarCliente

    /**
     * Método utilizado para controlar o acesso ao método CloseDB da classe
     * ConexaoDAO
     */
    public void CloseDB() {
        ConexaoDAO.CloseDB();
    }//Fecha o método CloseDB

}//Fecha a classe ClienteCTR