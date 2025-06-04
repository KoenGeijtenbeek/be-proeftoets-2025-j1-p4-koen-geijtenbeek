<?php require   APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row mb-3">
        <div class="col-1"></div>
        <div class="col-10 text-begin text-primary">        
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row" style="display:<?= $data['message']; ?>">
        <div class="col-1"></div>
        <div class="col-10 text-begin text-primary">        
            <div class="alert alert-success" role="alert">
                Record is verwijderd
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-3 mb-3">

        <div class="col-1"></div>
        <div class="col-10 text-begin text-danger">        
            <a href="<?= URLROOT; ?>/horloges/create" class="btn btn-warning" role="button">Nieuwe horloge</a>
        </div>
        <div class="col-1"></div>
    </div>

    <!-- begin tabel -->
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['horloges'] as $horloge) : ?>
                        <tr>
                            <td><?= $horloge->Merk; ?></td>
                            <td><?= $horloge->Model; ?></td>
                            <td><?= $horloge->Prijs; ?></td>
                            <td>
                                <a href="<?= URLROOT; ?>/horloges/delete/<?= $horloge->Id; ?>">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>