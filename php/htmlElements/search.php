      <form>
          <div class="card" id="searchForm">
              <div class="form-group">
                  <label for="search_q">
                      <h3>Standortname</h3>
                  </label><br>
                  <input type="text" class="form-control" id="search_q" name="entryName" placeholder="Standortname" autocomplete="off" <?php if(isset($_GET["entryName"])){echo "value='".htmlspecialchars($_GET["entryName"])."'";} ?> />
              </div>

              <div class="form-group">
                  <label for="holdingType">
                      <h3>Halterungsart</h3>
                  </label><br>
                  <select class="form-control" name="holdingType" id="holdingType">
                      <option value="(Keine Angabe)"<?php if(isset($_GET["holdingType"])&&$_GET["holdingType"]=="(Keine Angabe)"){echo "selected";} ?> >(Keine Angabe)</option>
                      <option value="Einfache Vorderradhalter"<?php if(isset($_GET["holdingType"])&&$_GET["holdingType"]=="Einfache Vorderradhalter"){echo "selected";} ?> >Einfache Vorderradhalter</option>
                      <option value="Fahrradgerechte Vorderradhalter"<?php if(isset($_GET["holdingType"])&&$_GET["holdingType"]=="Fahrradgerechte Vorderradhalter"){echo "selected";} ?>>Fahrradgerechte Vorderradhalter</option>
                      <option value="Anlehnbügel"<?php if(isset($_GET["holdingType"])&&$_GET["holdingType"]=="Anlehnbügel"){echo "selected";} ?> >Anlehnbügel</option>
                      <option value="Schräghochparker"<?php if(isset($_GET["holdingType"])&&$_GET["holdingType"]=="Schräghochparker"){echo "selected";} ?> >Schräghochparker</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="roofCheck">
                      Nur überdachte
                  </label>
                  <input type="checkbox" id="roofCheck" name="hasRoof" value="true" <?php if(isset($_GET["hasRoof"])){echo "checked";} ?> >
              </div>

              <div class="form-group">
                  <label for="publicCheck">
                      Nur öffentliche
                  </label>
                  <input type="checkbox" id="publicCheck" name="isPublic" value="true" <?php if(isset($_GET["isPublic"])){echo "checked";} ?> >
              </div>

              <label for="size">
                  <h3>Größe</h3>
              </label>
              <div class="form-group" id="size">
                  <label for="smallCheck">
                      Klein
                  </label>
                  <input type="checkbox" id="smallCheck" name="smallSpace" value="true" <?php if(isset($_GET["smallSpace"])){echo "checked";} ?> ><br>
                  <label for="mediumCheck">
                      Mittel
                  </label>
                  <input type="checkbox" id="mediumCheck" name="mediumSpace" value="true" <?php if(isset($_GET["mediumSpace"])){echo "checked";} ?> ><br>
                  <label for="bigCheck">
                      Groß
                  </label>
                  <input type="checkbox" id="bigCheck" name="largeSpace" value="true" <?php if(isset($_GET["largeSpace"])){echo "checked";} ?> ><br>
              </div>
              <input type="submit" name="SubmitSearch" value="Suchen" class="btn btn-default" formaction="Index.php" />
          </div>
      </form>
