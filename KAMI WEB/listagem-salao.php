<?php
session_start();
require 'logica-autenticacao.php';

$titulo = "Salões";

require 'cabecalho.php';
require 'conexao.php';
echo '<br>';
$sql = "SELECT id_cab, id_salao, nomesalao, telefonesalao, urlfoto, ruasalao, bairrosalao, numsalao, cidadesalao FROM salao ORDER BY nomesalao";

$stmt = $conn->query($sql);

$cont = $stmt->rowCount();

if ($cont == 0) {
?>
    <div class="d-flex text-center cor_tema">
        <div class="d-block my-auto mx-auto">
            <h2 class="mt-2">Não há nenhum salão cadastrado</h2>
        </div>
    </div>
<?php
}
?>

<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        function verificarAgendamento($id_salao, $dataHora)
        {
            global $conn;

            $sql = "SELECT * FROM agendamento WHERE id_salao = ? AND horario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_salao, $dataHora]);

            return $stmt->fetchColumn() > 0;
        }

        while ($rowSalao =  $stmt->fetch()) {
            $modalIdInfo = "exampleModalInfo" . $rowSalao["id_salao"];
            $modalIdAgenda = "exampleModalAgenda" . $rowSalao["id_salao"];
        ?>
            <div class="col">
                <div class="card shadow-sm shadow-lg bg-body-tertiary rounded">
                    <?php
                    if (!empty($rowSalao['urlfoto'])) {
                    ?>
                        <img src="<?= $rowSalao['urlfoto'] ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">
                    <?php
                    } else {
                    ?>
                        <img src="salao-icone.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">
                    <?php
                    }
                    ?>
                    <div class="card-body">
                        <h2 class="fw-semibold"><?= $rowSalao["nomesalao"] ?></h2>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button type="button" class="btn-lg" data-bs-toggle="modal" data-bs-target="#<?= $modalIdInfo ?>" style="background-color: #a98467;">
                                    <img src="lupa.svg" alt="">
                                </button>
                                <button type="button" class="btn-lg" data-bs-toggle="modal" data-bs-target="#<?= $modalIdAgenda ?>Xl" style="background-color: #a98467;">
                                    <img src="clock.svg" alt="">
                                </button>

                                <?php
                                if (autenticadocab()) {
                                    if (id_cab() == $rowSalao["id_cab"]) {
                                ?>
                                        <a href="formulario-alterar-salao.php?id_salao=<?= $rowSalao["id_salao"] ?>">
                                            <button type="button" class="btn-lg" style="background-color: #a98467;"><img src="editar.svg" alt=""></button>
                                        </a>
                                        <a href="excluir-salao.php?id_salao=<?= $rowSalao["id_salao"] ?>" onclick="if(!confirm('Tem certeza que deseja excluir?')) return false;">
                                            <button type="button" class="btn-lg" style="background-color: #a98467;"><img src="trash.svg"></button>
                                        </a>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="<?= $modalIdInfo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-1 " id="exampleModalLabel">Informações</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-2"><span data-feather="chevron-right" style="width:36px;height:36px;"></span><span class="text-black"> Telefone:</span> <?= $rowSalao["telefonesalao"] ?></p>
                                <p class="fs-2"><span data-feather="chevron-right" style="width:36px;height:36px;"></span><span class="text-black"> Rua:</span> <?= $rowSalao["ruasalao"] ?></p>
                                <p class="fs-2"><span data-feather="chevron-right" style="width:36px;height:36px;"></span><span class="text-black"> Bairro:</span> <?= $rowSalao["bairrosalao"] ?></p>
                                <p class="fs-2"><span data-feather="chevron-right" style="width:36px;height:36px;"></span><span class="text-black"> N°:</span> <?= $rowSalao["numsalao"] ?></p>
                                <p class="fs-2"><span data-feather="chevron-right" style="width:36px;height:36px;"></span><span class="text-black"> Cidade:</span> <?= $rowSalao["cidadesalao"] ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-lg btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="<?= $modalIdAgenda ?>Xl" tabindex="-1" aria-labelledby="<?= $modalIdAgenda ?>XlLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-1" id="<?= $modalIdAgenda ?>XlLabel">Agenda</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bd-example">
                                    <form action="inserir-agendamento.php" method="POST">
                                        <?php
                                        if (autenticadocli()) {
                                        ?>
                                            <input type="hidden" id="id_cli" name="id_cli" value="<?= id_cli() ?>">
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" id="id_salao" name="id_salao" value="<?= $rowSalao["id_salao"] ?>">
                                        <table class="table table-striped-columns table-bordered border-dark text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Hórarios</th>
                                                    <?php
                                                    
                                                    $dataAtual = time();
                                                    for ($i = 0; $i < 7; $i++) {
                                                        $data = date('d/m', $dataAtual);
                                                    ?>
                                                        <th scope="col"><?= $data ?></th>
                                                    <?php
                                                        $dataAtual += 24 * 60 * 60; 
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                $horarioAtual = strtotime('08:00');
                                                for ($j = 0; $j < 60 / 15 * 16; $j++) {
                                                    $horario = date('H:i', $horarioAtual);
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="table-secondary"><?= $horario ?></th>
                                                        <?php
                                                       
                                                        $dataAtual = time();
                                                        for ($k = 0; $k < 7; $k++) {
                                                            $data = date('Y-m-d', $dataAtual);
                                                            $dataHora = date('Y-m-d H:i:s', strtotime("$data $horario"));

                                                            
                                                            $agendado = verificarAgendamento($rowSalao["id_salao"], $dataHora);

                                                            
                                                            $celulaTabela = $agendado ? 'table-danger' : 'table-light';
                                                        ?>
                                                            <td class="<?= $celulaTabela ?>" data-horario="<?= $horario ?>" data-dia="<?= $data ?>">
                                                                <input class="form-check-input btn border-dark" type="checkbox" value="<?= $dataHora ?>" id="agendamento" name="agendamento">
                                                            </td>
                                                    <?php
                                                            $dataAtual += 24 * 60 * 60;
                                                        }
                                                        $horarioAtual += 15 * 60;
                                                    }
                                                    ?>

                                                    <script>
                                                        $(document).ready(function() {
                                                            function verificaEscondeCheckbox() {
                                                                $('input[type="checkbox"]').each(function() {
                                                                    var celula = $(this).closest('td');

                                                                    
                                                                    if (celula.hasClass('table-danger')) {
                                                                        $(this).hide();

                                                                    } else {
                                                                        $(this).show();
                                                                    }
                                                                });
                                                            }

                                                            // Chamar a função ao carregar a página
                                                            verificaEscondeCheckbox();

                                                            $('input[type="checkbox"]').on('change', function() {

                                                            if ($(this).is(':checked')) {
                                                                
                                                                $('input[type="checkbox"]').not(this).prop('disabled', true);
                                                            } else {
                                                                
                                                                $('input[type="checkbox"]').prop('disabled', false);
                                                            }
                                                            });

                                                        });
                                                    </script>

                                                    </tr>
                                            </tbody>
                                        </table>
                                        <?php
                                        if (autenticadocli()) {
                                        ?>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn-lg btn-success">Concluir agendamento</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="modal-footer">
                                                <p class="alert alert-secondary fs-5">Autentique-se como cliente para concluir o agendamento.</p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
require 'rodape.php';
?>