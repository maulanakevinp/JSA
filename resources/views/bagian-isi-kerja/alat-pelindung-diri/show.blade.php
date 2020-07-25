<h6 class="heading-small text-muted">ALAT PELINDUNG DIRI</h6>
<div class="pl-lg-4 row">
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Kepala/Wajah</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="safety_helmet" name="safety_helmet" value="1" {{ old('safety_helmet', $ijinKerja->alatPelindungDiri->safety_helmet) ? 'checked' : '' }}>
            <label class="custom-control-label" for="safety_helmet">Safety Helmet</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="safety_glass" name="safety_glass" value="1" {{ old('safety_glass', $ijinKerja->alatPelindungDiri->safety_glass) ? 'checked' : '' }}>
            <label class="custom-control-label" for="safety_glass">Safety Glass</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="goggle" name="goggle" value="1" {{ old('goggle', $ijinKerja->alatPelindungDiri->goggle) ? 'checked' : '' }}>
            <label class="custom-control-label" for="goggle">Goggle</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="face_shield" name="face_shield" value="1" {{ old('face_shield', $ijinKerja->alatPelindungDiri->face_shield) ? 'checked' : '' }}>
            <label class="custom-control-label" for="face_shield">Face Shield</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_kepala" value="1" data-toggle="tooltip" title="Others" {{ old('others_kepala', $ijinKerja->alatPelindungDiri->others_kepala) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_kepala" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_kepala', $ijinKerja->alatPelindungDiri->keterangan_others_kepala) }}">
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Telinga</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="ear_plug" name="ear_plug" value="1" {{ old('ear_plug', $ijinKerja->alatPelindungDiri->ear_plug) ? 'checked' : '' }}>
            <label class="custom-control-label" for="ear_plug">Ear Plug</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="ear_muff" name="ear_muff" value="1" {{ old('ear_muff', $ijinKerja->alatPelindungDiri->ear_muff) ? 'checked' : '' }}>
            <label class="custom-control-label" for="ear_muff">Ear Muff</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_telinga" value="1" data-toggle="tooltip" title="Others" {{ old('others_telinga', $ijinKerja->alatPelindungDiri->others_telinga) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_telinga" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_telinga', $ijinKerja->alatPelindungDiri->keterangan_others_telinga) }}">
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Kaki</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="safety_shoes_or_boot" name="safety_shoes_or_boot" value="1" {{ old('safety_shoes_or_boot', $ijinKerja->alatPelindungDiri->safety_shoes_or_boot) ? 'checked' : '' }}>
            <label class="custom-control-label" for="safety_shoes_or_boot">Safety Shoes/Boot</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="safety_rain_boot" name="safety_rain_boot" value="1" {{ old('safety_rain_boot', $ijinKerja->alatPelindungDiri->safety_rain_boot) ? 'checked' : '' }}>
            <label class="custom-control-label" for="safety_rain_boot">Safety Rain Boot</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="electrical_shoes_or_boot" name="electrical_shoes_or_boot" value="1" {{ old('electrical_shoes_or_boot', $ijinKerja->alatPelindungDiri->electrical_shoes_or_boot) ? 'checked' : '' }}>
            <label class="custom-control-label" for="electrical_shoes_or_boot">Electrical Shoes/Boot</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_kaki" value="1" data-toggle="tooltip" title="Others" {{ old('others_kaki', $ijinKerja->alatPelindungDiri->others_kaki) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_kaki" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_kaki', $ijinKerja->alatPelindungDiri->keterangan_others_kaki) }}">
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Ketinggian</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="full_body_harness" name="full_body_harness" value="1" {{ old('full_body_harness', $ijinKerja->alatPelindungDiri->full_body_harness) ? 'checked' : '' }}>
            <label class="custom-control-label" for="full_body_harness">Full Body Harness</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="safety_line" name="safety_line" value="1" {{ old('safety_line', $ijinKerja->alatPelindungDiri->safety_line) ? 'checked' : '' }}>
            <label class="custom-control-label" for="safety_line">Safety Line</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_ketinggian" value="1" data-toggle="tooltip" title="Others" {{ old('others_ketinggian', $ijinKerja->alatPelindungDiri->others_ketinggian) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_ketinggian" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_ketinggian', $ijinKerja->alatPelindungDiri->keterangan_others_ketinggian) }}">
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Pernapasan</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="half_mask_respirator" name="half_mask_respirator" value="1" {{ old('half_mask_respirator', $ijinKerja->alatPelindungDiri->half_mask_respirator) ? 'checked' : '' }}>
            <label class="custom-control-label" for="half_mask_respirator">Half Mask Respirator</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="full_face_respirator" name="full_face_respirator" value="1" {{ old('full_face_respirator', $ijinKerja->alatPelindungDiri->full_face_respirator) ? 'checked' : '' }}>
            <label class="custom-control-label" for="full_face_respirator">Full Face Respirator</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="dust_mask" name="dust_mask" value="1" {{ old('dust_mask', $ijinKerja->alatPelindungDiri->dust_mask) ? 'checked' : '' }}>
            <label class="custom-control-label" for="dust_mask">Dust Mask</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="scba_or_airline_set" name="scba_or_airline_set" value="1" {{ old('scba_or_airline_set', $ijinKerja->alatPelindungDiri->scba_or_airline_set) ? 'checked' : '' }}>
            <label class="custom-control-label" for="scba_or_airline_set">SCBA/Airline Set</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_pernapasan" value="1" data-toggle="tooltip" title="Others" {{ old('others_pernapasan', $ijinKerja->alatPelindungDiri->others_pernapasan) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_pernapasan" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_pernapasan', $ijinKerja->alatPelindungDiri->keterangan_others_pernapasan) }}">
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Tangan</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="cotton_glove" name="cotton_glove" value="1" {{ old('cotton_glove', $ijinKerja->alatPelindungDiri->cotton_glove) ? 'checked' : '' }}>
            <label class="custom-control-label" for="cotton_glove">Cotton Glove</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="leather_glove" name="leather_glove" value="1" {{ old('leather_glove', $ijinKerja->alatPelindungDiri->leather_glove) ? 'checked' : '' }}>
            <label class="custom-control-label" for="leather_glove">Leather Glove</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="rubber_glove" name="rubber_glove" value="1" {{ old('rubber_glove', $ijinKerja->alatPelindungDiri->rubber_glove) ? 'checked' : '' }}>
            <label class="custom-control-label" for="rubber_glove">cRubber Glove</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="chemical_glove" name="chemical_glove" value="1" {{ old('chemical_glove', $ijinKerja->alatPelindungDiri->chemical_glove) ? 'checked' : '' }}>
            <label class="custom-control-label" for="chemical_glove">Chemical Glove</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_tangan" value="1" data-toggle="tooltip" title="Others" {{ old('others_tangan', $ijinKerja->alatPelindungDiri->others_tangan) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_tangan" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_tangan', $ijinKerja->alatPelindungDiri->keterangan_others_tangan) }}">
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Badan</p>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="coverall" name="coverall" value="1" {{ old('coverall', $ijinKerja->alatPelindungDiri->coverall) ? 'checked' : '' }}>
            <label class="custom-control-label" for="coverall">Coverall</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="chemical_suit" name="chemical_suit" value="1" {{ old('chemical_suit', $ijinKerja->alatPelindungDiri->chemical_suit) ? 'checked' : '' }}>
            <label class="custom-control-label" for="chemical_suit">Chemical Suit</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="apron" name="apron" value="1" {{ old('apron', $ijinKerja->alatPelindungDiri->apron) ? 'checked' : '' }}>
            <label class="custom-control-label" for="apron">Apron</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input disabled type="checkbox" class="custom-control-input" id="life_vest" name="life_vest" value="1" {{ old('life_vest', $ijinKerja->alatPelindungDiri->life_vest) ? 'checked' : '' }}>
            <label class="custom-control-label" for="life_vest">Life Vest</label>
        </div>
        <div class="form-group mt-2">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input disabled type="checkbox" name="others_badan" value="1" data-toggle="tooltip" title="Others" {{ old('others_badan', $ijinKerja->alatPelindungDiri->others_badan) ? 'checked' : '' }}>
                    </div>
                </div>
                <input disabled type="text" class="form-control" name="keterangan_others_badan" placeholder="Keterangan Lainnya ..." value="{{ old('keterangan_others_badan', $ijinKerja->alatPelindungDiri->keterangan_others_badan) }}">
            </div>
        </div>
    </div>
</div>
