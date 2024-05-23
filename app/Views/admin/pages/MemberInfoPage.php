<?= $this->extend('/admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
        <div class="card">
            <div class="card-header text-center">
                <h2>Member Information</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 text-center">
                        <img src="<?= site_url('member/member-photo/'.$member['m_id'])?>" class="rounded-circle" alt="User Photo" width="150" height="150">
                    </div>
                    <div class="col-md-8">
                        <h4 id="user-name"><?= esc($member['m_first_name']) ?></h4>
                        <p><strong>Date of Birth:</strong> <span id="user-dob"><?= esc($member['m_dob']) ?></span></p>
                        <p><strong>Address:</strong> <span id="user-address"><?= esc($member['m_address']) ?></span></p>
                        <p><strong>Gender:</strong> <span id="user-gender"><?= esc($member['m_gender']) ?></span></p>
                        <p><strong>Phone:</strong> <span id="user-phone"><?= esc($member['m_phone']) ?></span></span></p>
                        <p><strong>Status:</strong><span id="user-status"><?=esc($member['m_status']) ?></span></p>
                    </div>
                </div>
                <h5>Documents:</h5>
                <?php if(!empty($documents)): ?>
                    <?php foreach($documents as $document): ?>
                        <li><a href="<?= base_url('member-document/' . esc($document['id'])) ?>" target="_blank"><?= esc($document['document_name']) ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No documens found</p>
                <?php endif; ?>

            </div>
        </div>
</div>

<?= $this->endSection() ?>
