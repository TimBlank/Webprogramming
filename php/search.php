      <form>
          <div class="form-group">
              <label for="search_q">
                  Standortname
              </label><br>
              <input type="text" id="search_q" name="q" value="" placeholder="Standortname" autocomplete="off" />
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

          <div class="form-group">
              <label >
                  Größe
              </label><br>
              <input type="radio" name="size" value="male" checked> Klein<br>
              <input type="radio" name="size" value="female"> Mittel<br>
              <input type="radio" name="size" value="other"> Groß
          </div>


          <button type="submit" class="btn btn-default">Suchen</button>
      </form>
