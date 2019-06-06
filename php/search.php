      <form>
          <div class="card" id="searchForm">
          <div class="form-group" >
              <label for="search_q">
                  <h3>Standortname</h3>
              </label><br>
              <input type="text" class="form-control" id="search_q" name="entryName" placeholder="Standortname" autocomplete="off" />
          </div>

          <div class="form-group">
              <label for="holdingType">
                  <h3>Halterungsart</h3>
              </label><br>
              <select class="form-control" name="holdingType" id="holdingType">
                  <option value="(Keine Angabe)">(Keine Angabe)</option>
                  <option value="Einfache Vorderradhalter">Einfache Vorderradhalter</option>
                  <option value="Fahrradgerechte Vorderradhalter">Fahrradgerechte Vorderradhalter</option>
                  <option value="Anlehnbügel">Anlehnbügel</option>
                  <option value="Schräghochparker">Schräghochparker</option>
              </select>
          </div>

          <div class="form-group">
              <label for="roofCheck">
                  Überdacht
              </label>
              <input type="checkbox" id="roofCheck" name="hasRoof" value="true" checked>
          </div>

          <div class="form-group">
              <label for="publicCheck">
                  Öffentlich
              </label>
              <input type="checkbox" id="publicCheck" name="isPublic" value="true" checked>
          </div>

          <label for="size">
             <h3>Größe</h3>
          </label>
          <div class="form-group" id="size">
              <label for="smallCheck">
                  Klein
              </label>
              <input type="checkbox" id="smallCheck" name="smallSpace" value="true" checked><br>
              <label for="mediumCheck">
                  Mittel
              </label>
              <input type="checkbox" id="mediumCheck" name="mediumSpace" value="true" checked><br>
              <label for="bigCheck">
                  Groß
              </label>
              <input type="checkbox" id="bigCheck" name="largeSpace" value="true" checked><br>
          </div>
          <input type="submit" name="SubmitSearch" value="Suchen" class="btn btn-default" formaction="Index.php" />
          </div>
      </form>
