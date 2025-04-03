/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package br.com.kami.dto;

/**
 *
 * @author Aluno
 */
public class CabeleireiroDTO {
    private int id_cab;
    private String nomeCab, emailCab, senhaCab;

    public int getId_cab() {
        return id_cab;
    }

    public void setId_cab(int id_cab) {
        this.id_cab = id_cab;
    }

    public String getNomeCab() {
        return nomeCab;
    }

    public void setNomeCab(String nomeCab) {
        this.nomeCab = nomeCab;
    }

    public String getEmailCab() {
        return emailCab;
    }

    public void setEmailCab(String emailCab) {
        this.emailCab = emailCab;
    }

    public String getSenhaCab() {
        return senhaCab;
    }

    public void setSenhaCab(String senhaCab) {
        this.senhaCab = senhaCab;
    }
}
