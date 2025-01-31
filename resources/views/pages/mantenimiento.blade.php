@extends('layouts.app', ['page' => __('Mantenimiento Programado'), 'pageSlug' => 'mantenimiento'])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header my-4">
          <p>
            ¿Usted sabe cuántos Km tiene su Lubricante? Nosotros podemos ayudarle a sacarse
            obligaciones de sus tareas le brindamos un servicio de alertas a través de su
            email, avisándole cuando debería usted reemplazar los filtros y lubricantes de
            su automóvil.
            <br /><br />
            Así podemos mantener su vehículo en condiciones, Nuestra tarea en servicios es
            revisar 11 ítem fundamentales a la hora de su revisión.
            <br /><br />
            Los 11 Ítem Importantes a controlar en su servicio.
            <br /><br />
          </p>
          <ul type="square">
            <li>1: Elevación de su vehículo para poder visualizar su parte Baja.</li><br />
            <li>2: Cambio de Lubricantes de Motor Caja Velocidad, Caja Transferencia en
              vehículos 4 x4</li><br />
            <li>3: Cambio de Filtros Aceite, Aire, Combustible, Habitáculo.</li><br />
            <li>4: Control de los Sistemas de frenos Convencionales y ABS.</li><br />
            <li>5: Control del estado de Refrigerante de Motor.</li><br />
            <li>6: Control Líquido de frenos con sistema de Control de Calidad de Líquido y
              degradación.</li><br />
            <li>7: Control de Tren delantero y Tren Trasero.</li><br />
            <li>8: Control de Fuelles de Semi–Ejes y sus juntas.</li><br />
            <li>9: Control de amortiguadores.</li><br />
            <li>10: Control electrónico de todos los sistemas.</li><br />
            <li>11: Control de luces exterior faros auxiliares.</li><br />
          </ul>
          <h6 class="text-center alert-info p-2 text-darker">El taller recolecta los residuos peligrosos para su
            tratamiento a
            través de empresas que se vinculan a esta tarea y ayudando así al medio ambiente.</h6>

        </div>
      </div>
    </div>
  </div>
@endsection
