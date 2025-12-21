<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aspiration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'location',
        'content',
        'image',
        'status',
        'admin_response',
        'responded_by',
        'responded_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'responded_at' => 'datetime',
        ];
    }

    /**
     * Get the user that owns the aspiration
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin that responded to this aspiration
     */
    public function responder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responded_by');
    }

    /**
     * Scope for filtering by status
     */
    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Check if aspiration is new
     */
    public function isNew(): bool
    {
        return $this->status === 'baru';
    }

    /**
     * Check if aspiration is being processed
     */
    public function isProcessing(): bool
    {
        return $this->status === 'diproses';
    }

    /**
     * Check if aspiration is completed
     */
    public function isCompleted(): bool
    {
        return $this->status === 'selesai';
    }

    /**
     * Check if aspiration is rejected
     */
    public function isRejected(): bool
    {
        return $this->status === 'ditolak';
    }
}
