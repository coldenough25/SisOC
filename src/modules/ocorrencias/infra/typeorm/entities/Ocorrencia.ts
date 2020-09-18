import {
  Column,
  CreateDateColumn,
  Entity,
  JoinColumn,
  ManyToOne,
  PrimaryGeneratedColumn,
  UpdateDateColumn,
} from 'typeorm';

import OcorrenciaTipo from './OcorrenciaTipo';

@Entity('ocorrencia')
export default class Ocorrencia {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  descricao: string;

  @Column({ length: 1 })
  situacao: string;

  @Column('timestamp with time zone')
  datahora: Date;

  @ManyToOne(() => OcorrenciaTipo, { eager: true })
  @JoinColumn({ name: 'ocorrencia_tipo_id' })
  ocorrencia_tipo: OcorrenciaTipo;

  @Column()
  ocorrencia_tipo_id: string;

  @CreateDateColumn()
  created_at: Date;

  @UpdateDateColumn()
  updated_at: Date;
}
