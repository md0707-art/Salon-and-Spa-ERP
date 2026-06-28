<?php

namespace App\Repositories\Interfaces;

interface AppointmentRepositoryInterface
{
    /**
     * Get all appointments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Find an appointment by ID.
     *
     * @param  int  $id
     * @return \App\Models\Appointment
     */
    public function find($id);

    /**
     * Create a new appointment.
     *
     * @param  array  $data
     * @return \App\Models\Appointment
     */
    public function create(array $data);

    /**
     * Update an existing appointment.
     *
     * @param  int    $id
     * @param  array  $data
     * @return \App\Models\Appointment
     */
    public function update($id, array $data);

    /**
     * Delete an appointment by ID.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete($id);
}
