/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.kami.dto;

/**
 *
 * @author Cauã e Júlia
 */

public class SalaoDTO {
    private int id_salao, numSalao;
    private String nomeSalao, urlfoto, cidadeSalao, ruaSalao, bairroSalao, telefoneSalao;

    public String getUrlfoto() {
        return urlfoto;
    }

    public void setUrlfoto(String urlfoto) {
        this.urlfoto = urlfoto;
    }

    public int getId_salao() {
        return id_salao;
    }

    public void setId_salao(int id_salao) {
        this.id_salao = id_salao;
    }

    public String getTelefoneSalao() {
        return telefoneSalao;
    }

    public void setTelefoneSalao(String telefoneSalao) {
        this.telefoneSalao = telefoneSalao;
    }

    public int getNumSalao() {
        return numSalao;
    }

    public void setNumSalao(int numSalao) {
        this.numSalao = numSalao;
    }

    public String getNomeSalao() {
        return nomeSalao;
    }

    public void setNomeSalao(String nomeSalao) {
        this.nomeSalao = nomeSalao;
    }

    public String getCidadeSalao() {
        return cidadeSalao;
    }

    public void setCidadeSalao(String cidadeSalao) {
        this.cidadeSalao = cidadeSalao;
    }

    public String getRuaSalao() {
        return ruaSalao;
    }

    public void setRuaSalao(String ruaSalao) {
        this.ruaSalao = ruaSalao;
    }

    public String getBairroSalao() {
        return bairroSalao;
    }

    public void setBairroSalao(String bairroSalao) {
        this.bairroSalao = bairroSalao;
    }

    
}