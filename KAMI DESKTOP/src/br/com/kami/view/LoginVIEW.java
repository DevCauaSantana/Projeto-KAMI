/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.kami.view;

import javax.swing.JOptionPane;
import br.com.kami.dto.CabeleireiroDTO;
import br.com.kami.ctr.CabeleireiroCTR;

/**
 *
 * @author Aluno
 */
public class LoginVIEW extends javax.swing.JFrame {

    CabeleireiroCTR cabeleireiroCTR = new CabeleireiroCTR(); //Cria um obejto usuarioCTR
    CabeleireiroDTO cabeleireiroDTO = new CabeleireiroDTO(); //Cria um objeto usuarioDTO

    /**
     * Creates new form LoginVIEW
     */
    public LoginVIEW() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        emailCab = new javax.swing.JTextField();
        jLabel4 = new javax.swing.JLabel();
        senhaCab = new javax.swing.JPasswordField();
        btnLogar = new javax.swing.JButton();
        btnSair = new javax.swing.JButton();
        btnCadastro = new javax.swing.JButton();

        jPanel1.setBackground(new java.awt.Color(0, 0, 0));

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/br/com/kami/view/imagens/LOGO_1.png"))); // NOI18N

        jLabel2.setFont(new java.awt.Font("Tahoma", 0, 24)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(255, 255, 255));
        jLabel2.setText("Senha:");

        jLabel3.setFont(new java.awt.Font("Tahoma", 0, 24)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(255, 255, 255));
        jLabel3.setText("Email: ");

        emailCab.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        emailCab.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                emailCabActionPerformed(evt);
            }
        });

        jLabel4.setFont(new java.awt.Font("Tahoma", 1, 48)); // NOI18N
        jLabel4.setForeground(new java.awt.Color(255, 255, 255));
        jLabel4.setText("Login");
        jLabel4.setToolTipText("");
        jLabel4.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        senhaCab.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N

        btnLogar.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btnLogar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/br/com/kami/view/imagens/salvar.png"))); // NOI18N
        btnLogar.setText("Logar");
        btnLogar.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                btnLogarMouseClicked(evt);
            }
        });
        btnLogar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnLogarActionPerformed(evt);
            }
        });

        btnSair.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btnSair.setIcon(new javax.swing.ImageIcon(getClass().getResource("/br/com/kami/view/imagens/sair.png"))); // NOI18N
        btnSair.setText("Sair");
        btnSair.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                btnSairMouseClicked(evt);
            }
        });
        btnSair.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnSairActionPerformed(evt);
            }
        });

        btnCadastro.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btnCadastro.setIcon(new javax.swing.ImageIcon(getClass().getResource("/br/com/kami/view/imagens/prod_add.png"))); // NOI18N
        btnCadastro.setText("Cadastro");
        btnCadastro.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                btnCadastroMouseClicked(evt);
            }
        });
        btnCadastro.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnCadastroActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel1)
                .addGap(23, 23, 23)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel3)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(emailCab, javax.swing.GroupLayout.DEFAULT_SIZE, 260, Short.MAX_VALUE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel2)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(senhaCab))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(btnLogar, javax.swing.GroupLayout.PREFERRED_SIZE, 95, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(btnCadastro)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(btnSair)))
                        .addContainerGap())
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(jLabel4)
                        .addGap(103, 103, 103))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 363, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap())
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel4)
                        .addGap(18, 18, 18)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(emailCab, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel3))
                        .addGap(44, 44, 44)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel2)
                            .addComponent(senhaCab, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(35, 35, 35)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(btnLogar)
                            .addComponent(btnCadastro)
                            .addComponent(btnSair))
                        .addGap(105, 105, 105))))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(0, 0, 0)
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void emailCabActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_emailCabActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_emailCabActionPerformed

    private void btnLogarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnLogarActionPerformed
        if (verificaPreenchimento()) {
            logar();
        }
    }//GEN-LAST:event_btnLogarActionPerformed

    private void btnSairActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnSairActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_btnSairActionPerformed

    private void btnSairMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btnSairMouseClicked
        // TODO add your handling code here:
        System.exit(0);
    }//GEN-LAST:event_btnSairMouseClicked

    private void btnCadastroActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnCadastroActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_btnCadastroActionPerformed

    private void btnCadastroMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btnCadastroMouseClicked
        // TODO add your handling code here:
        CabeleireiroVIEW cabeleireiroVIEW = new CabeleireiroVIEW();
        cabeleireiroVIEW.setVisible(true);
        this.dispose();
    }//GEN-LAST:event_btnCadastroMouseClicked

    private void btnLogarMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btnLogarMouseClicked
        // TODO add your handling code here:
        PrincipalVIEW principalVIEW = new PrincipalVIEW(cabeleireiroDTO);
        principalVIEW.setVisible(true);
        this.dispose();
    }//GEN-LAST:event_btnLogarMouseClicked

    private void logar() {
        cabeleireiroDTO.setEmailCab(emailCab.getText());
        cabeleireiroDTO.setSenhaCab(String.valueOf(senhaCab.getPassword()));
        cabeleireiroDTO.setId_cab(cabeleireiroCTR.logarCabeleireiro(cabeleireiroDTO));
        if (cabeleireiroDTO.getId_cab() > 0) {
            this.dispose();
            new PrincipalVIEW(cabeleireiroDTO).setVisible(true);
        } else {
            JOptionPane.showMessageDialog(null, "Email ou senha\nIncorreto!!!");
        }
    }//Fecha método logar()

    private boolean verificaPreenchimento() {
        if (emailCab.getText().equalsIgnoreCase("")) {
            JOptionPane.showMessageDialog(null, "O campo Email deve ser preenchido");
            emailCab.requestFocus();
            return false;
        } else {
            if ((senhaCab.getPassword().equals(""))) {
                JOptionPane.showMessageDialog(null, "O campo Senha deve ser preenchido");
                senhaCab.requestFocus();
                return false;
            } else {
                return true;
            }//Fecha else senhaCab
        }//Fecha else emailCab
    }//Fecha método verificaPreenchimento()

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(PrincipalVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(PrincipalVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(PrincipalVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(PrincipalVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new LoginVIEW().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnCadastro;
    private javax.swing.JButton btnLogar;
    private javax.swing.JButton btnSair;
    private javax.swing.JTextField emailCab;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPasswordField senhaCab;
    // End of variables declaration//GEN-END:variables
}
