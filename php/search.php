      <form>
          <div class="form-group">
              <label for="search_q">
                  Standortname
              </label><br>
              <input type="text" id="search_q" name="locationName" value="" placeholder="Standortname" autocomplete="off" />
          </div>

          <div class="form-group">
              <label for="holderType">
                  Halterungsart
              </label><br>
              <select class="form-control" name="Halterungsart" id="holderType">
                  <option value="nothingSelectet">(Nichts ausgewählt)</option>
                  <option value="simpleFrontHolder">Einfache Vorderradhalter</option>
                  <option value="friendlyFrontHolder">Fahrradgerechte Vorderradhalter</option>
                  <option value="supportHolder">Anlehnbügel</option>
                  <option value="angularHolder">Schräghochparker</option>
              </select>
          </div>

          <div class="form-group">
              <label for="roofCheck">
                  Überdacht
              </label>
              <input type="checkbox" id="roofCheck" name="Überdacht" value="roof" checked>
          </div>

          <div class="form-group">
              <label for="publicCheck">
                  Öffentlich
              </label>
              <input type="checkbox" id="publicCheck" name="Öffentlich" value="public" checked>
          </div>

          <label for="size">
              Größe
          </label>
          <div class="form-group" id="size">
              <label for="smallCheck">
                  Klein
              </label>
              <input type="checkbox" id="smallCheck" name="kleinerStellplatz" value="small" checked><br>
              <label for="mediumCheck">
                  Mittel
              </label>
              <input type="checkbox" id="mediumCheck" name="mittlererStellplatz" value="medium" checked><br>
              <label for="bigCheck">
                  Groß
              </label>
              <input type="checkbox" id="bigCheck" name="großerStellplatz" value="big" checked><br>
          </div>

          <button type="submit" class="btn btn-default" formaction="../../index.php">Suchen</button>
      </form>
