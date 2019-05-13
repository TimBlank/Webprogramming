<div class="card bg-light" style="width: 4rem;">
    <div class="dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Einloggen oder Regestrieren">
            <i class="fas fa-search"></i>
            <span class="sr-only">Suche</span>
        </a>
        <div class="dropdown-menu bg-light">
            <a class="dropdown-item">
                <form class="form-inline dropdown-item">
                    <div class="form-group">
                        <label for="search_q">
                            Standortname
                        </label>
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
                    <button type="submit" class="btn btn-default">Suchen</button>
                </form>
            </a>
        </div>
    </div>
</div>
