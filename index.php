 <?php
  // Configura el correo del destinatario (tu correo)
  $destinatario = "tu_correo@gmail.com";
  ?>
 <!DOCTYPE html>
 <html lang="es">

 <head>
   <meta charset="UTF-8">
   <title>Formulario de Consentimiento informado</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- SweetAlert2 CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <!-- Animate.css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
   <!-- Bootstrap Icons (opcional, por si quieres usar iconos) -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <!-- Signature Pad -->
   <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
   <link rel="stylesheet" href="css/styles.css">
 </head>
 <body>

   <!-- Hero Banner con imagen de fondo -->
   <div class="hero mb-4">
     <div class="hero-content">

     </div>
   </div>


   <div class="container animate__animated animate__fadeIn">
     <form method="POST" action="enviar.php" onsubmit="guardarFirmas(event)">
       <h2 class="text-center mb-4">Formulario de Consentimiento</h2>
       <div class="section">
         <h3 class="text-primary mb-4">Datos Personales</h3>

         <div class="row g-3">


           <!-- Fila 2 - Nombre/Apellido -->
           <div class="col-md-6">
             <label class="form-label">Nombre*</label>
             <input type="text" class="form-control" name="nombre" required
               pattern="[A-Za-zÁ-ÿ\s']+"
               title="Solo letras y espacios (no se permiten números o caracteres especiales)">
           </div>
           <div class="col-md-6">
             <label class="form-label">Apellido*</label>
             <input type="text" class="form-control" name="apellido" required
               pattern="[A-Za-zÁ-ÿ\s']+"
               title="Solo letras y espacios (no se permiten números o caracteres especiales)">
           </div>
           <!-- Selector independiente de menor de edad -->
           <div class="col-12">
             <label class="form-label">¿La persona es menor de edad?</label>
             <select class="form-select" name="menor_edad" id="menor_edad" required>
               <option value="Si">Si</option>
               <option value="No">No</option>
             </select>
           </div>
           <!-- Fila 3 - Fecha/Edad/Género -->
           <!-- Fila 3 - Fecha/Edad -->
           <div class="col-md-4">
             <label class="form-label">Fecha Nacimiento*</label>
             <input type="date" class="form-control" name="fecha_nacimiento" required>
           </div>
           <div class="col-md-2">
             <label class="form-label">Edad*</label>
             <input type="number" class="form-control" name="edad" readonly required>
           </div>
           <div class="col-md-6">
             <label class="form-label">Género*</label>
             <select class="form-select" name="genero" required>
               <option value="Masculino">Masculino</option>
               <option value="Femenino">Femenino</option>
             </select>
           </div>

           <!-- Fila 4 - Contacto -->
           <div class="col-md-6">
             <label class="form-label">Correo Electrónico*</label>
             <input type="email" class="form-control" name="correo" required>
           </div>
           <div class="col-md-6">
             <label class="form-label">Dirección*</label>
             <input type="text" class="form-control" name="direccion" required>
           </div>

           <!-- Fila 5 - Ciudad/Estado/ZIP -->
           <div class="col-md-4">
             <label class="form-label">Ciudad</label>
             <input type="text" class="form-control" name="ciudad">
           </div>
           <div class="col-md-4">
             <label class="form-label">Estado</label>
             <input type="text" class="form-control" name="estado">
           </div>
           <div class="col-md-4">
             <label class="form-label,">Código Postal*</label>
             <input type="text" class="form-control" name="zipcode"
               pattern="\d{5}"
               title="Solo números (5 dígitos)" required>
           </div>

           <!-- Fila 6 - Teléfonos -->
           <!-- Fila 6 - Teléfonos -->
           <div class="col-md-4">
             <label class="form-label">Teléfono Casa</label>
             <input type="tel" class="form-control" name="telefono_casa"
               title="Solo números (sin espacios ni guiones)">
           </div>
           <div class="col-md-4">
             <label class="form-label">Teléfono Celular*</label>
             <input type="tel" class="form-control" name="telefono_celular" required
               title="Solo números (mínimo 7 dígitos)">
           </div>
           <div class="col-md-4">
             <label class="form-label">Teléfono Trabajo</label>
             <input type="tel" class="form-control" name="telefono_trabajo"
               title="Solo números (sin espacios ni guiones)">
           </div>

           <!-- Fila 7 - Contacto Emergencia -->
           <!-- Campos de emergencia -->
           <div id="emergencia-fields">
             <!-- Fila 7 - Contacto Emergencia -->
             <div class="row g-3 align-items-center">
               <div class="col-md-8">
                 <label class="form-label">Nombre de Contacto Emergencia*</label>
                 <input type="text" class="form-control"
                   name="contacto_emergencia" id="contacto_emergencia"
                   required pattern="[A-Za-zÁ-ÿ\s']+"
                   title="Solo letras y espacios">
               </div>
               <div class="col-md-4">
                 <label class="form-label">Teléfono Emergencia*</label>
                 <input type="tel" class="form-control"
                   name="telefono_emergencia" id="telefono_emergencia"
                   required title="Solo números (sin espacios ni guiones)">
               </div>

               <!-- Fila 8 - Relación -->
               <div class="col-12">
                 <label class="form-label">Relación*</label>
                 <select class="form-select" name="relacion" id="relacion" required>
                   <option value="Esposa">Esposa</option>
                   <option value="Esposo">Esposo</option>
                   <option value="Madre">Madre</option>
                   <option value="Padre">Padre</option>
                   <option value="Amigo">Amigo</option>
                   <option value="Hijo">Hijo</option>
                   <option value="Hija">Hija</option>
                 </select>
               </div>
             </div>
           </div>
         </div>
       </div>


       <!-- Sección 2: Quejas y Afirmaciones -->
       <!-- Sección 2: Quejas y Afirmaciones -->
       <div class="section" id="seccion-quejas">
         <h3 class="text-primary">¿Cuáles son sus principales quejas?</h3>
         <div class="mb-3 d-flex flex-wrap gap-2">
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Fatiga" id="fatiga">
             <label class="form-check-label" for="fatiga">Fatiga o falta de energía</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Estrés" id="estres">
             <label class="form-check-label" for="estres">Estrés</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Mala alimentación" id="alimentacion">
             <label class="form-check-label" for="alimentacion">Mala alimentación</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Concentración" id="concentracion">
             <label class="form-check-label" for="concentracion">Problemas de concentración</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Depresión" id="depresion">
             <label class="form-check-label" for="depresion">Bajo estado de ánimo o depresión</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Resfriado" id="resfriado">
             <label class="form-check-label" for="resfriado">Síntomas de resfriado o gripe</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Arrugas" id="arrugas">
             <label class="form-check-label" for="arrugas">Arrugas faciales o líneas de expresión</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Piel opaca" id="piel">
             <label class="form-check-label" for="piel">Piel opaca o seca</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="quejas[]" value="Mala absorción" id="absorcion">
             <label class="form-check-label" for="absorcion">Problemas de mala absorción</label>
           </div>
         </div>
         <div class="mb-3">
           <label for="otros_quejas">Otros:</label>
           <input type="text" class="form-control" name="otros_quejas" id="otros_quejas">
         </div>
       </div>

       <!-- Sección 3: Afirmaciones -->
       <!-- Sección 3: Afirmaciones -->
       <div class="section" id="seccion-afirmaciones">
         <h3 class="text-primary">¿Qué afirmaciones describen mejor el motivo por el que está aquí hoy?</h3>
         <div class="mb-3 d-flex flex-wrap gap-2">
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Energía" id="energia">
             <label class="form-check-label" for="energia">Más energía y bienestar</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Cuidar cuerpo" id="cuerpo">
             <label class="form-check-label" for="cuerpo">Cuidar mi cuerpo</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Pérdida de peso" id="peso">
             <label class="form-check-label" for="peso">Apoyar mi pérdida de peso</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Evitar enfermedad" id="enfermedad">
             <label class="form-check-label" for="enfermedad">Evitar enfermedades</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Recuperación" id="recuperacion">
             <label class="form-check-label" for="recuperacion">Recuperarme rápido</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Envejecimiento" id="envejecimiento">
             <label class="form-check-label" for="envejecimiento">Retrasar el envejecimiento</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Parecer joven" id="joven">
             <label class="form-check-label" for="joven">Sentirme y verme joven</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Piel suave" id="piel">
             <label class="form-check-label" for="piel">Piel más suave y brillante</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Toxinas" id="toxinas">
             <label class="form-check-label" for="toxinas">Eliminar toxinas</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" name="afirmaciones[]" value="Resaca" id="resaca">
             <label class="form-check-label" for="resaca">Recuperarme de resaca</label>
           </div>
         </div>
         <div class="mb-3">
           <label for="otros_afirmaciones">Otros:</label>
           <input type="text" class="form-control" name="otros_afirmaciones" id="otros_afirmaciones">
         </div>
       </div>

       <!-- Sección 4: Preguntas de Salud -->
       <!-- Sección 4: Preguntas de Salud -->
       <!-- Sección 4: Preguntas de Salud -->
       <div class="section">
         <h3 class="text-primary">Preguntas de Salud</h3>

         <!-- Embarazo / Lactancia (No obligatoria) -->
         <div class="mb-3">
           <label>¿Está usted embarazada o en período de lactancia?</label><br>
           <input type="radio" name="embarazada" value="Si"> Si
           <input type="radio" name="embarazada" value="No"> No
         </div>

         <!-- Preguntas obligatorias -->
         <div class="mb-3">
           <label>¿Es usted diabético? *</label><br>
           <input type="radio" name="diabetico" value="Si" required> Si
           <input type="radio" name="diabetico" value="No" required> No
         </div>

         <div class="mb-3">
           <label>¿Es usted fumador? *</label><br>
           <input type="radio" name="fumador" value="Si" required> Si
           <input type="radio" name="fumador" value="No" required> No
         </div>

         <div class="mb-3">
           <label>¿Consume alguna droga recreativa? *</label><br>
           <input type="radio" name="drogas" value="Si" required onclick="toggleField('drogas_frecuencia', true)"> Si
           <input type="radio" name="drogas" value="No" required onclick="toggleField('drogas_frecuencia', false)"> No
         </div>

         <div class="mb-3">
           <label>¿Cuáles y con qué frecuencia?</label>
           <input type="text" class="form-control" name="drogas_frecuencia" id="drogas_frecuencia" disabled required>
         </div>

         <div class="mb-3">
           <label>¿Es usted paciente renal? *</label><br>
           <input type="radio" name="renal" value="Si" required> Si
           <input type="radio" name="renal" value="No" required> No
         </div>

         <div class="mb-3">
           <label>¿Tiene usted alguna insuficiencia cardíaca? *</label><br>
           <input type="radio" name="insuficiencia" value="Si" required> Si
           <input type="radio" name="insuficiencia" value="No" required> No
         </div>

         <div class="mb-3">
           <label>¿Consume medicamentos anticoagulantes? *</label><br>
           <input type="radio" name="anticoagulantes" value="Si" required> Si
           <input type="radio" name="anticoagulantes" value="No" required> No
         </div>

         <div class="mb-3">
           <label>¿Es usted paciente de cáncer? *</label><br>
           <input type="radio" name="cancer" value="Si" required> Si
           <input type="radio" name="cancer" value="No" required> No
         </div>

         <div class="mb-3">
           <label>¿Es usted alérgico(a)? *</label><br>
           <input type="radio" name="alergico" value="Si" required onclick="toggleField('medicamento_alergico', true)"> Si
           <input type="radio" name="alergico" value="No" required onclick="toggleField('medicamento_alergico', false)"> No
         </div>

         <div class="mb-3">
           <label>Si su respuesta es si especifique:</label>
           <input type="text" class="form-control" name="medicamento_alergico" id="medicamento_alergico" disabled required>
         </div>

         <div class="mb-3">
           <label>¿Tiene usted alguna condición médica? *</label><br>
           <input type="radio" name="condicion_medica" value="Si" required onclick="toggleField('condicion_explicacion', true)"> Si
           <input type="radio" name="condicion_medica" value="No" required onclick="toggleField('condicion_explicacion', false)"> No
         </div>

         <div class="mb-3">
           <label>Si su contestación es sí, explique:</label>
           <textarea class="form-control" name="condicion_explicacion" id="condicion_explicacion" disabled required></textarea>
         </div>

         <div class="mb-3">
           <label>Medicamentos recetados - Intensidad - Frecuencia - Enfermedad tratada:</label>
           <textarea class="form-control" name="medicamentos_recetados"></textarea>
         </div>

         <div class="mb-3">
           <label>Medicamentos de venta libre - Intensidad - Frecuencia - Enfermedad tratada:</label>
           <textarea class="form-control" name="medicamentos_venta_libre"></textarea>
         </div>

         <div class="mb-3">
           <label>Vitaminas y otros suplementos - Intensidad - Frecuencia - Enfermedad tratada:</label>
           <textarea class="form-control" name="suplementos"></textarea>
         </div>

       </div>





       <!-- Sección 5: Productos y Servicios -->
       <!-- Sección 5: Productos y Servicios -->
       <div class="section" id="seccion-declaraciones">
         <h3 class="text-primary">Productos y Servicios</h3>
         <p>Proporcionamos complementos vitamínicos por vía intravenosa y por inyección. Las vitaminas y los minerales son esenciales para que las células funcionen correctamente. Los refuerzos vitamínicos y las infusiones son la forma más rápida y eficaz de que su cuerpo reciba hidratación y micronutrientes. Estos nutrientes esenciales se entregan en el torrente sanguíneo donde sus células pueden comenzar a absorber lo que su cuerpo necesita de inmediato.</p>
         <p>Este documento está destinado a servir de confirmación del consentimiento informado para la terapia intravenosa.</p>

         <h3 class="text-primary">Declaraciones Legales (Marque todas las que correspondan)</h3>
         <ul style="list-style-type: none; padding: 0; width: 100%;">
           <!-- Cada elemento de la lista -->
           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="alergias"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 He informado al profesional de cualquier alergia conocida a medicamentos u otras sustancias que puedan incluirse en los ingredientes de mis soluciones, o de cualquier reaccion pasada a los anestesicos.
               </span>
             </label>
           </li>

           <!-- Repetir para todos los elementos -->
           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="fda"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 La terapia de infusion intravenosa y cualquier afirmacion hecha sobre estas infusiones no han sido evaluadas por la Administracion de Alimentos y Medicamentos de los Estados Unidos (FDA) y no estan destinadas a diagnosticar, tratar, curar o prevenir ninguna enfermedad medica. Estas infusiones intravenosas no sustituyen la atencion medica de su medico. </span>
             </label>
           </li>

           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="medicamentos"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 He informado al profesional de todos los medicamentos y suplementos actuales.
               </span>
             </label>
           </li>

           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="derechos"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 Entiendo que tengo derecho a ser informado durante el procedimiento, y los riesgos y beneficios. Salvo en caso de emergencia, los procedimientos no se realizan hasta que yo haya tenido la oportunidad de recibir dicha informacion y de dar mi consentimiento informado.
               </span>
             </label>
           </li>

           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="riesgos"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 Entiendo que: El procedimiento implica la insercion de una aguja en una vena y la inyeccion de la solucion prescrita. 2. Las alternativas a la terapia intravenosa son la suplementacion oral y/o los cambios en la dieta y el estilo de vida. 3. Los riesgos de la terapia intravenosa incluyen, entre otros: a) Ocasionalmente: Molestias, hematomas y dolor en el lugar de la inyeccion. b) Raramente: Inflamacion de la vena utilizada para la inyeccion, flebitis, alteraciones metabolicas y lesiones. c) Extremadamente raros: Reaccion alergica grave, anafilaxia, infeccion, paro cardiaco y muerte. 4. Los beneficios de la terapia intravenosa incluyen: a) Los inyectables no se ven afectados por problemas de absorcion estomacal o intestinal. b) La cantidad total de infusion esta disponible para los tejidos. c) Los nutrientes son forzados a entrar en las celulas por medio de un alto gradiente de concentracion. d) Se pueden administrar dosis mas altas de nutrientes que las posibles por via oral sin irritacion intestinal.
               </span>
             </label>
           </li>

           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="veracidad"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 Por la presente me pongo bajo su cuidado para una terapia vitaminica intravenosa. Tambien verifico que toda la informacion presentada al proveedor medico en mi historia clinica es verdadera a mi leal saber y entender. No estoy tergiversando y me pongo bajo su cuidado con el unico proposito de recibir tratamiento para estas condiciones.
               </span>
             </label>
           </li>

           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="pago"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 Por la presente reconozco que entiendo que mi cobertura de seguro, incluyendo Medicare, puede no pagar por este servicio no cubierto, y que todos los servicios auxiliares a este tratamiento pueden ser tambien servicios no cubiertos y no reembolsables. Acepto ser responsable del pago en el momento del servicio de todos los servicios no cubiertos.
               </span>
             </label>
           </li>

           <li style="width: 100%; margin-bottom: 15px;">
             <label style="display: flex; align-items: flex-start; width: 100%;">
               <input type="checkbox" name="declaraciones[]" value="cargo"
                 style="margin: 3px 10px 0 0; align-self: flex-start; flex-shrink: 0;">
               <span style="flex-grow: 1; white-space: normal;">
                 Entiendo y acepto que, en el caso de que la enfermera encargada del procedimiento de administracion del suero de vitaminas detecte que no he proporcionado informacion completa sobre enfermedades o padecimientos relevantes que podrian afectar el tratamiento, se impedira la realizacion del procedimiento. Reconozco que, independientemente de si el servicio es cancelado posteriormente, se aplicara un cargo adicional de $50.00 por los inconvenientes ocasionados. Estoy de acuerdo con estas condiciones y confirmo mi compromiso de brindar toda la informacion necesaria para garantizar un tratamiento seguro y efectivo.
               </span>
             </label>
           </li>
         </ul>

       </div>

       <!-- Sección 7: Firmas -->
       <div class="section">
         <div class="row justify-content-center"> <!-- Centrar contenido -->
           <div class="col-md-6"> <!-- Reducir a 6 columnas centradas -->
             <div class="signature-box" id="firma-paciente"></div>
             <div class="text-primary" onclick="borrarFirma()">Borrar Firma</div>
             <input type="hidden" id="firmaPaciente" name="firma_paciente" required>
             <div>Firma del Paciente*</div>
           </div>
         </div>
       </div>

       <!-- Botón de Envío -->
       <button type="submit" class="btn btn-primary w-100 mt-4 animate__animated animate__pulse">Enviar Formulario</button>
     </form>
   </div>

   <!-- Bootstrap JS y SweetAlert2 -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     // Configuración de las firmas
     let signaturePad;

     function initFirma() {
       const container = document.getElementById('firma-paciente');
       container.innerHTML = "";
       const canvas = document.createElement('canvas');
       canvas.width = container.clientWidth;
       canvas.height = container.clientHeight;
       container.appendChild(canvas);
       signaturePad = new SignaturePad(canvas);
     }

     function borrarFirma() {
       signaturePad.clear();
     }

     function guardarFirmas(e) {
       e.preventDefault();
       // Validar Sección 2: Quejas
       const quejasCheckboxes = document.querySelectorAll('input[name="quejas[]"]:checked');
       const otrosQuejas = document.getElementById('otros_quejas').value.trim();
       if (quejasCheckboxes.length === 0 && otrosQuejas === '') {
         document.getElementById('seccion-quejas').scrollIntoView({
           behavior: 'smooth',
           block: 'start'
         });
         return;
       }

       // Validar Sección 3: Afirmaciones
       const afirmacionesCheckboxes = document.querySelectorAll('input[name="afirmaciones[]"]:checked');
       const otrosAfirmaciones = document.getElementById('otros_afirmaciones').value.trim();
       if (afirmacionesCheckboxes.length === 0 && otrosAfirmaciones === '') {
         document.getElementById('seccion-afirmaciones').scrollIntoView({
           behavior: 'smooth',
           block: 'start'
         });
         return;
       }

       // Validar Sección 5: Declaraciones Legales
       const declaracionesCheckboxes = document.querySelectorAll('input[name="declaraciones[]"]');
       const allDeclaracionesChecked = Array.from(declaracionesCheckboxes).every(checkbox => checkbox.checked);

       if (!allDeclaracionesChecked) {
         document.getElementById('seccion-declaraciones').scrollIntoView({
           behavior: 'smooth',
           block: 'start'
         });
         return;
       }

       // Resto de validaciones y envío
       if (signaturePad.isEmpty()) {
         document.getElementById('firma-paciente').closest('.section').scrollIntoView({
           behavior: 'smooth',
           block: 'start'
         });
         Swal.fire('Error', 'La firma del paciente es obligatoria', 'error');
         return;
       }

       document.getElementById('firmaPaciente').value = signaturePad.toDataURL();

       Swal.fire({
         icon: 'success',
         title: 'Enviado',
         text: 'El formulario ha sido enviado correctamente.',
         showConfirmButton: false,
         timer: 2000,
       }).then(() => {
         e.target.submit();
       });
     }

     window.onload = initFirma;
   </script>

   </script>
   <script>
     document.addEventListener('DOMContentLoaded', function() {
       // Configurar fecha máxima
       const today = new Date().toISOString().split('T')[0];
       document.querySelector('input[name="fecha_nacimiento"]').setAttribute('max', today);

       // Event listener para cálculo de edad
       document.querySelector('input[name="fecha_nacimiento"]').addEventListener('change', calcularEdad);
     });

     function calcularEdad() {
       const fechaInput = document.querySelector('input[name="fecha_nacimiento"]');
       const edadInput = document.querySelector('input[name="edad"]');

       const fechaNacimiento = new Date(fechaInput.value);
       const hoy = new Date();

       // Validaciones
       if (fechaNacimiento > hoy) {
         alert("❌ Error: La fecha de nacimiento no puede ser futura");
         fechaInput.value = '';
         edadInput.value = '';
         return;
       }

       const fechaMinima = new Date();
       fechaMinima.setFullYear(hoy.getFullYear() - 150);
       if (fechaNacimiento < fechaMinima) {
         alert("❌ Error: La fecha excede el rango válido (máximo 150 años)");
         fechaInput.value = '';
         edadInput.value = '';
         return;
       }

       // Cálculo de edad
       let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
       const mes = hoy.getMonth() - fechaNacimiento.getMonth();

       if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
         edad--;
       }

       edadInput.value = edad;

       // Eliminamos la línea que modificaba el select de menor_edad
     }
   </script>

   <script>
     function toggleField(fieldId, isEnabled) {
       var field = document.getElementById(fieldId);
       field.disabled = !isEnabled;
       if (!isEnabled) {
         field.value = ''; // Limpiar campo si se deshabilita
       }
     }
   </script>
   <script>
     document.addEventListener('DOMContentLoaded', function() {
       const menorEdad = document.getElementById('menor_edad');
       const camposEmergencia = [
         document.getElementById('contacto_emergencia'),
         document.getElementById('telefono_emergencia'),
         document.getElementById('relacion')
       ];

       function actualizarCampos() {
         const esMenor = menorEdad.value === 'Si';

         camposEmergencia.forEach(campo => {
           campo.disabled = !esMenor;
           campo.required = esMenor;
         });
       }

       // Ejecutar al cargar y cuando cambie la selección
       menorEdad.addEventListener('change', actualizarCampos);
       actualizarCampos(); // Estado inicial
     });
   </script>

 </body>

 </html>