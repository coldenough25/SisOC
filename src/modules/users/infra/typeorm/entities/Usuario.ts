import {
  Entity,
  Column,
  PrimaryGeneratedColumn,
  ManyToOne,
  JoinColumn,
  CreateDateColumn,
  UpdateDateColumn,
} from 'typeorm';

import { Exclude } from 'class-transformer';

import UsuarioTipo from './UsuarioTipo';

@Entity('usuario')
class Usuario {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  ra_siape: string;

  @Column()
  nome: string;

  @Column()
  email: string;

  @Column()
  @Exclude()
  senha: string;

  @ManyToOne(() => UsuarioTipo, { eager: true })
  @JoinColumn({ name: 'usuario_tipo_id' })
  usuario_tipo: UsuarioTipo;

  @Column()
  usuario_tipo_id: number;

  @CreateDateColumn()
  created_at: Date;

  @UpdateDateColumn()
  updated_at: Date;
}

export default Usuario;
