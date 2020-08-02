<div class="row px-3" style="font-size: 6pt">
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Kepala/Wajah</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="safety_helmet" name="safety_helmet" value="1" {{ old('safety_helmet', $ijinKerja->alatPelindungDiri->safety_helmet) ? 'checked' : '' }}>
            <label class="mb-0" for="safety_helmet">Safety Helmet</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="safety_glass" name="safety_glass" value="1" {{ old('safety_glass', $ijinKerja->alatPelindungDiri->safety_glass) ? 'checked' : '' }}>
            <label class="mb-0" for="safety_glass">Safety Glass</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="goggle" name="goggle" value="1" {{ old('goggle', $ijinKerja->alatPelindungDiri->goggle) ? 'checked' : '' }}>
            <label class="mb-0" for="goggle">Goggle</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="face_shield" name="face_shield" value="1" {{ old('face_shield', $ijinKerja->alatPelindungDiri->face_shield) ? 'checked' : '' }}>
            <label class="mb-0" for="face_shield">Face Shield</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_kepala" name="others_kepala" value="1" {{ old('others_kepala', $ijinKerja->alatPelindungDiri->others_kepala) ? 'checked' : '' }}>
            <label class="mb-0" for="others_kepala">{{ $ijinKerja->alatPelindungDiri->keterangan_others_kepala ? $ijinKerja->alatPelindungDiri->keterangan_others_kepala : 'Lainnya' }}</label>
        </div>
    </div>
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Telinga</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="ear_plug" name="ear_plug" value="1" {{ old('ear_plug', $ijinKerja->alatPelindungDiri->ear_plug) ? 'checked' : '' }}>
            <label class="mb-0" for="ear_plug">Ear Plug</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="ear_muff" name="ear_muff" value="1" {{ old('ear_muff', $ijinKerja->alatPelindungDiri->ear_muff) ? 'checked' : '' }}>
            <label class="mb-0" for="ear_muff">Ear Muff</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_telinga" name="others_telinga" value="1" {{ old('others_telinga', $ijinKerja->alatPelindungDiri->others_telinga) ? 'checked' : '' }}>
            <label class="mb-0" for="others_telinga">{{ $ijinKerja->alatPelindungDiri->keterangan_others_telinga ? $ijinKerja->alatPelindungDiri->keterangan_others_telinga : 'Lainnya' }}</label>
        </div>
    </div>
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Kaki</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="safety_shoes_or_boot" name="safety_shoes_or_boot" value="1" {{ old('safety_shoes_or_boot', $ijinKerja->alatPelindungDiri->safety_shoes_or_boot) ? 'checked' : '' }}>
            <label class="mb-0" for="safety_shoes_or_boot">Safety Shoes/Boot</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="safety_rain_boot" name="safety_rain_boot" value="1" {{ old('safety_rain_boot', $ijinKerja->alatPelindungDiri->safety_rain_boot) ? 'checked' : '' }}>
            <label class="mb-0" for="safety_rain_boot">Safety Rain Boot</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="electrical_shoes_or_boot" name="electrical_shoes_or_boot" value="1" {{ old('electrical_shoes_or_boot', $ijinKerja->alatPelindungDiri->electrical_shoes_or_boot) ? 'checked' : '' }}>
            <label class="mb-0" for="electrical_shoes_or_boot">Electrical Shoes/Boot</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_kaki" name="others_kaki" value="1" {{ old('others_kaki', $ijinKerja->alatPelindungDiri->others_kaki) ? 'checked' : '' }}>
            <label class="mb-0" for="others_kaki">{{ $ijinKerja->alatPelindungDiri->keterangan_others_kaki ? $ijinKerja->alatPelindungDiri->keterangan_others_kaki : 'Lainnya'}}</label>
        </div>
    </div>
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Ketinggian</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="full_body_harness" name="full_body_harness" value="1" {{ old('full_body_harness', $ijinKerja->alatPelindungDiri->full_body_harness) ? 'checked' : '' }}>
            <label class="mb-0" for="full_body_harness">Full Body Harness</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="safety_line" name="safety_line" value="1" {{ old('safety_line', $ijinKerja->alatPelindungDiri->safety_line) ? 'checked' : '' }}>
            <label class="mb-0" for="safety_line">Safety Line</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_ketinggian" name="others_ketinggian" value="1" {{ old('others_ketinggian', $ijinKerja->alatPelindungDiri->others_ketinggian) ? 'checked' : '' }}>
            <label class="mb-0" for="others_ketinggian">{{ $ijinKerja->alatPelindungDiri->keterangan_others_ketinggian ? $ijinKerja->alatPelindungDiri->keterangan_others_ketinggian : 'Lainnya'}}</label>
        </div>
    </div>
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Pernapasan</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="half_mask_respirator" name="half_mask_respirator" value="1" {{ old('half_mask_respirator', $ijinKerja->alatPelindungDiri->half_mask_respirator) ? 'checked' : '' }}>
            <label class="mb-0" for="half_mask_respirator">Half Mask Respirator</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="full_face" name="full_face" value="1" {{ old('full_face', $ijinKerja->alatPelindungDiri->full_face) ? 'checked' : '' }}>
            <label class="mb-0" for="full_face">Full Face Respirator</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="dust_mask" name="dust_mask" value="1" {{ old('dust_mask', $ijinKerja->alatPelindungDiri->dust_mask) ? 'checked' : '' }}>
            <label class="mb-0" for="dust_mask">Dust Mask</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="scba_or_airline_set" name="scba_or_airline_set" value="1" {{ old('scba_or_airline_set', $ijinKerja->alatPelindungDiri->scba_or_airline_set) ? 'checked' : '' }}>
            <label class="mb-0" for="scba_or_airline_set">SCBA/Airline Set</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_pernapasan" name="others_pernapasan" value="1" {{ old('others_pernapasan', $ijinKerja->alatPelindungDiri->others_pernapasan) ? 'checked' : '' }}>
            <label class="mb-0" for="others_pernapasan">{{ $ijinKerja->alatPelindungDiri->keterangan_others_pernapasan ? $ijinKerja->alatPelindungDiri->keterangan_others_pernapasan : 'Lainnya' }}</label>
        </div>
    </div>
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Tangan</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="cotton_glove" name="cotton_glove" value="1" {{ old('cotton_glove', $ijinKerja->alatPelindungDiri->cotton_glove) ? 'checked' : '' }}>
            <label class="mb-0" for="cotton_glove">Cotton Glove</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="leather_glove" name="leather_glove" value="1" {{ old('leather_glove', $ijinKerja->alatPelindungDiri->leather_glove) ? 'checked' : '' }}>
            <label class="mb-0" for="leather_glove">Leather Glove</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="rubber_glove" name="rubber_glove" value="1" {{ old('rubber_glove', $ijinKerja->alatPelindungDiri->rubber_glove) ? 'checked' : '' }}>
            <label class="mb-0" for="rubber_glove">Rubber Glove</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="chemical_glove" name="chemical_glove" value="1" {{ old('chemical_glove', $ijinKerja->alatPelindungDiri->chemical_glove) ? 'checked' : '' }}>
            <label class="mb-0" for="chemical_glove">Chemical Glove</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_tangan" name="others_tangan" value="1" {{ old('others_tangan', $ijinKerja->alatPelindungDiri->others_tangan) ? 'checked' : '' }}>
            <label class="mb-0" for="others_tangan">{{ $ijinKerja->alatPelindungDiri->keterangan_others_tangan ? $ijinKerja->alatPelindungDiri->keterangan_others_tangan : 'Lainnya' }}</label>
        </div>
    </div>
    <div class="col-3 mb-1">
        <p class="mb-0 heading-small font-weight-bold">Badan</p>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="coverall" name="coverall" value="1" {{ old('coverall', $ijinKerja->alatPelindungDiri->coverall) ? 'checked' : '' }}>
            <label class="mb-0" for="coverall">Coverall</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="chemical_suit" name="chemical_suit" value="1" {{ old('chemical_suit', $ijinKerja->alatPelindungDiri->chemical_suit) ? 'checked' : '' }}>
            <label class="mb-0" for="chemical_suit">Chemical Suit</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="apron" name="apron" value="1" {{ old('apron', $ijinKerja->alatPelindungDiri->apron) ? 'checked' : '' }}>
            <label class="mb-0" for="apron">Apron</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="life_vest" name="life_vest" value="1" {{ old('life_vest', $ijinKerja->alatPelindungDiri->life_vest) ? 'checked' : '' }}>
            <label class="mb-0" for="life_vest">Life Vest</label>
        </div>
        <div class="mb-0">
            <input class="cawang" type="checkbox" id="others_badan" name="others_badan" value="1" {{ old('others_badan', $ijinKerja->alatPelindungDiri->others_badan) ? 'checked' : '' }}>
            <label class="mb-0" for="others_badan">{{ $ijinKerja->alatPelindungDiri->keterangan_others_badan ? $ijinKerja->alatPelindungDiri->keterangan_others_badan : 'Lainnya' }}</label>
        </div>
    </div>
</div>
