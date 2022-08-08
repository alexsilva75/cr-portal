<div id="subscription" class="subscription-form-container modal">
    <p class="subheading">Interessado?</p>
    <h2 class="heading-secondary">Torne-se Cliente!</h2>
    <p>Preenchar o formulário. Nossa equipe entrará em contato para agendarmos a instalação.</p>

    <form id="subscriptionForm" @submit.prevent="submitForm">
        {{-- <p>@{{ message }}</p> --}}
        @csrf
        <div class="form-group">
            <label for="name" class="input-caption">Nome*</label>
            <input type="text" v-model="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="surname" class="input-caption">Sobrenome*</label>
            <input type="text" v-model="surname" id="surname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="input-caption">E-mail*</label>
            <input type="text" v-model="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cpf" class="input-caption">CPF*</label>
            <input type="text" v-model="cpf" id="cpf" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="birthDate" class="input-caption">Data de Nascimento*</label>
            <input type="text" v-model="birthDate" id="birthDate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address" class="input-caption">Endereço*</label>
            <input type="text" v-model="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="addressNumber" class="input-caption">Número*</label>
            <input type="text" v-model="addressNumber" id="addressNumber" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="neighborhood" class="input-caption">Bairro*</label>
            <input type="text" v-model="neighborhood" id="neighborhood" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address" class="input-caption">Cidade*</label>
            <select  v-model="address" id="address" class="form-control form-select" required>
                <option value="SANTO AMARO">SANTO AMARO</option>
                <option value="SAUBARA">SAUBARA</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone" class="input-caption">Telefone/Celular*</label>
            <input type="text" v-model="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="whatsapp" class="input-caption">Whatsapp</label>
            <input type="text" v-model="whatsapp" id="whatsapp" class="form-control">
        </div>
        <button class="btn btn-primary m-sm" type="submit">Enviar</button>
    </form>
    {{-- <script src="{{ asset('js/app.js')}}"></script> --}}
</div>
