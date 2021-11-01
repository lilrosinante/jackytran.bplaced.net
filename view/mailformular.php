<?php require 'header.php'; ?>
    <div class="container" id="cont1">
        <form action="../model/mailaction.php" method="post">
            <fieldset class="form-group">
                <legend class="col-form-label"><h3>Nachricht</h3></legend>
                    <div class="form-group">
                        <label for="nachname">Nachname</label>
                        <input class="form-control" name="nachname" id="nachname" type="text" placeholder="Nachname"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email2" id="email" type="email" placeholder="Email"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="mitteilung">Mitteilung</label>
                        <textarea class="form-control" name="mitteilung" id="mitteilung" rows="6" placeholder="Message"
                                  required="required"></textarea>
                    </div>
                    <div class="field half actions">
                        <input type="submit" class="button alt" name="btn_speichernsenden" value="&nbsp; Senden &nbsp;">
                    </div>
            </fieldset>
        </form>
    </div>
<?php require 'footer.php'; ?>